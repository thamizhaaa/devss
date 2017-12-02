<?php

//defined('PATH_LIB') or die("Restricted Access");
#############################################################################################################################
#												PayPal Adaptive Payments													#
#	@file	:	class.pp_adaptive.php																						#
#	@author	:	S.R.Rama Krishna																								#																														
#	@email	:	ramakrishna@vinformaxtech.com																						#
#############################################################################################################################

class PP_ADAPTIVE {

    private $ENV = "live"; //environment
    private $UserName; //API UserName
    private $Password; //API Password
    private $Signature; //API Signature
    private $AppID = "APP-80W284485P519543T"; //API AppId
    private $Endpoint = ""; //API EndPoint
    //Proxy Information
    private $USE_PROXY = FALSE;
    private $PROXY_HOST = '127.0.0.1';
    private $PROXY_PORT = '808';

    function __construct($env, $api_uname, $api_pswd, $api_sign) {
        $this->ENV = strtolower($env);
        //echo $this->ENV;
        if ($this->ENV == "sandbox") {
            $this->Endpoint = "https://svcs.sandbox.paypal.com/AdaptivePayments";
        } else {
            $this->Endpoint = "https://svcs.paypal.com/AdaptivePayments";
        }

        $this->setApiDetail($api_uname, $api_pswd, $api_sign);
    }

    public function setApiDetail($api_uname, $api_pswd, $api_sign) {
        if (trim($api_uname) != '' && trim($api_pswd) != '' && $api_sign != '') {
            $this->UserName = $api_uname;
            $this->Password = $api_pswd;
            $this->Signature = $api_sign;
        } else {
            die('API Paramters Missing');
        }
    }

    public function setProxy($host, $port) {
        if (trim($host) != '' && trim($port) != '') {
            $this->USE_PROXY = TRUE;
            $this->PROXY_HOST = $host;
            $this->PROXY_PORT = $port;
        } else {
            die('Proxy Paramters Missing');
        }
    }

    public function setAppId($app_id) {
        if (trim($app_id) != '') {
            $this->AppID = $app_id;
        } else {
            die('App Id Missing');
        }
    }

    private function callPayPal($methodName, $aryParam) {

        //setting the curl parameters.
        //$f = fopen(PATH_ROOT.DS.'request.txt', 'w');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->Endpoint . "/" . $methodName);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        //turning off the server and peer verification(TrustManager Concept).
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_STDERR,$f);
        curl_setopt($ch, CURLOPT_POST, 1);
        // Set the HTTP Headers
        curl_setopt(
                $ch, CURLOPT_HTTPHEADER, array(
            'X-PAYPAL-REQUEST-DATA-FORMAT: NV',
            'X-PAYPAL-RESPONSE-DATA-FORMAT: NV',
            'X-PAYPAL-SECURITY-USERID: ' . urlencode($this->UserName),
            'X-PAYPAL-SECURITY-PASSWORD: ' . urlencode($this->Password),
            'X-PAYPAL-SECURITY-SIGNATURE: ' . urlencode($this->Signature),
            'X-PAYPAL-SERVICE-VERSION: ' . urlencode('1.6.0'),
            'X-PAYPAL-APPLICATION-ID: ' . urlencode($this->AppID)
                )
        );


        //curl_setopt($ch, CURLOPT_HEADER, true); // Display headers
        //curl_setopt($ch, CURLOPT_VERBOSE, true); // Display communication with server
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return data instead of display to std out
        //if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
        if ($this->USE_PROXY)
            curl_setopt($ch, CURLOPT_PROXY, $this->PROXY_HOST . ":" . $this->PROXY_PORT);

        $aryCurl = $aryParam;
        $aryCurl['requestEnvelope.detailLevel'] = 'ReturnAll';
        $aryCurl['requestEnvelope.errorLanguage'] = 'en_US';

        //preparing
        $nvpreq = http_build_query($aryCurl);

        //setting the nvpreq as POST FIELD to curl
        curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

        //getting response from server
        $response = curl_exec($ch);

        //converting NVPResponse to an Associative Array
        $nvpResArray = $this->deformatNVP($response);



        if (curl_errno($ch)) {
            // moving to display page to display curl errors
            $nvpResArray['curl']['error_no'] = curl_errno($ch);
            $nvpResArray['curl']['error_msg'] = curl_error($ch);
        } else {
            //closing the curl
            curl_close($ch);
        }
        //fclose($f);

        return $nvpResArray;
    }

    /* '----------------------------------------------------------------------------------
     * This function will take NVPString and convert it to an Associative Array and it will decode the response.
     * It is usefull to search for a particular key and displaying arrays.
     * @nvpstr is NVPString.
     * @nvpArray is Associative Array.
      ----------------------------------------------------------------------------------
     */

    private function deformatNVP($nvpstr) {
        $intial = 0;
        $nvpArray = array();

        while (strlen($nvpstr)) {
            //postion of Key
            $keypos = strpos($nvpstr, '=');
            //position of value
            $valuepos = strpos($nvpstr, '&') ? strpos($nvpstr, '&') : strlen($nvpstr);

            /* getting the Key and Value values and storing in a Associative Array */
            $keyval = substr($nvpstr, $intial, $keypos);
            $valval = substr($nvpstr, $keypos + 1, $valuepos - $keypos - 1);
            //decoding the respose
            $nvpArray[urldecode($keyval)] = urldecode($valval);
            $nvpstr = substr($nvpstr, $valuepos + 1, strlen($nvpstr));
        }
        return $nvpArray;
    }

    /* '----------------------------------------------------------------------------------
      Purpose: Redirects to PayPal.com site.
      Inputs:  $cmd is the querystring
      Returns:
      ----------------------------------------------------------------------------------
     */

    public function GoToPayPal($cmd) {
        $payPalURL = "";

        if ($this->ENV == "sandbox") {
            $payPalURL = "https://www.sandbox.paypal.com/webscr?" . $cmd;
        } else {
            $payPalURL = "https://www.paypal.com/webscr?" . $cmd;
        }
        header("Location: " . $payPalURL);
    }

    /*
      '-------------------------------------------------------------------------------------------------------------------------------------------
      ' Purpose: 	Prepares the parameters for the Pay API Call.
      ' Inputs:
      '
      ' Required:
      '
      ' Optional:
      '
      '
      ' Returns:
      '		The NVP Collection object of the Pay call response.
      '--------------------------------------------------------------------------------------------------------------------------------------------
     */

    public function CallPay($actionType, $cancelUrl, $returnUrl, $currencyCode, $receiverEmailArray, $receiverAmountArray, $receiverPrimaryArray, $receiverInvoiceIdArray, $feesPayer, $ipnNotificationUrl, $memo, $pin, $preapprovalKey, $reverseAllParallelPaymentsOnError, $senderEmail, $trackingId) {
        /* Gather the information to make the Pay call.
          The variable arynvp holds the name value pairs
         */

        // required fields
        $arynvp = array(
            'actionType' => $actionType,
            'currencyCode' => $currencyCode,
            'returnUrl' => $returnUrl,
            'cancelUrl' => $cancelUrl
        );

        if (0 != count($receiverAmountArray)) {
            reset($receiverAmountArray);
            while (list($key, $value) = each($receiverAmountArray)) {
                if ("" != $value)
                    $arynvp["receiverList.receiver(" . $key . ").amount"] = $value;
            }
        }

        if (0 != count($receiverEmailArray)) {
            reset($receiverEmailArray);
            while (list($key, $value) = each($receiverEmailArray)) {
                if ("" != $value)
                    $arynvp["receiverList.receiver(" . $key . ").email"] = $value;
            }
        }

        if (0 != count($receiverPrimaryArray)) {
            reset($receiverPrimaryArray);
            while (list($key, $value) = each($receiverPrimaryArray)) {
                if ("" != $value)
                    $arynvp["receiverList.receiver(" . $key . ").primary"] = $value;
            }
        }

        if (0 != count($receiverInvoiceIdArray)) {
            reset($receiverInvoiceIdArray);
            while (list($key, $value) = each($receiverInvoiceIdArray)) {
                if ("" != $value)
                    $arynvp["receiverList.receiver(" . $key . ").invoiceId"] = $value;
            }
        }

        // optional fields
        if ("" != $feesPayer)
            $arynvp["feesPayer"] = $feesPayer;

        if ("" != $ipnNotificationUrl)
            $arynvp["ipnNotificationUrl"] = $ipnNotificationUrl;

        if ("" != $memo)
            $arynvp["memo"] = $memo;

        if ("" != $pin)
            $arynvp["pin"] = $pin;

        if ("" != $preapprovalKey)
            $arynvp["preapprovalKey"] = $preapprovalKey;

        if ("" != $reverseAllParallelPaymentsOnError)
            $arynvp["reverseAllParallelPaymentsOnError"] = $reverseAllParallelPaymentsOnError;

        if ("" != $senderEmail)
            $arynvp["senderEmail"] = $senderEmail;

        if ("" != $trackingId)
            $arynvp["trackingId"] = $trackingId;

        /* Make the Pay call to PayPal */
        $resArray = $this->callPayPal("Pay", $arynvp);

        /* Return the response array */
        return $resArray;
    }

    /*
      '-------------------------------------------------------------------------------------------------------------------------------------------
      ' Purpose: 	Prepares the parameters for the Preapproval API Call.
      ' Inputs:
      '
      ' Required:
      '
      ' Optional:
      '
      '
      ' Returns:
      '		The NVP Collection object of the Preapproval call response.
      '--------------------------------------------------------------------------------------------------------------------------------------------
     */

    public function CallPreapproval($returnUrl, $cancelUrl, $currencyCode, $startingDate, $endingDate, $maxTotalAmountOfAllPayments, $senderEmail, $maxNumberOfPayments, $paymentPeriod, $dateOfMonth, $dayOfWeek, $maxAmountPerPayment, $maxNumberOfPaymentsPerPeriod, $pinType, $ipnNotificationUrl) {
        /* Gather the information to make the Preapproval call.
          The array arynvp holds the name value pairs
         */
        $arynvp = array(
            'returnUrl' => $returnUrl,
            'cancelUrl' => $cancelUrl,
            'currencyCode' => $currencyCode,
            'startingDate' => $startingDate,
            'endingDate' => $endingDate,
            'maxTotalAmountOfAllPayments' => $maxTotalAmountOfAllPayments
        );

        // optional fields
        if ("" != $senderEmail)
            $arynvp["senderEmail"] = $senderEmail;

        if ("" != $maxNumberOfPayments)
            $arynvp["maxNumberOfPayments"] = $maxNumberOfPayments;

        if ("" != $paymentPeriod)
            $arynvp["paymentPeriod"] = $paymentPeriod;

        if ("" != $dateOfMonth)
            $arynvp["dateOfMonth"] = $dateOfMonth;

        if ("" != $dayOfWeek)
            $arynvp["dayOfWeek"] = $dayOfWeek;

        if ("" != $maxAmountPerPayment)
            $arynvp["maxAmountPerPayment"] = $maxAmountPerPayment;

        if ("" != $maxNumberOfPaymentsPerPeriod)
            $arynvp["maxNumberOfPaymentsPerPeriod"] = $maxNumberOfPaymentsPerPeriod;

        if ("" != $pinType)
            $arynvp["pinType"] = $pinType;

        if ("" != $ipnNotificationUrl)
            $arynvp["ipnNotificationUrl"] = $ipnNotificationUrl;
        /* Make the Preapproval call to PayPal */
        $resArray = $this->callPayPal("Preapproval", $arynvp);

        /* Return the response array */
        return $resArray;
    }

    /*
      '-------------------------------------------------------------------------------------------------------------------------------------------
      ' Purpose: 	Prepares the parameters for the PreapprovalDetails API Call.
      ' Inputs:
      '
      ' Required:
      '		preapprovalKey:		A preapproval key that identifies the agreement resulting from a previously successful Preapproval call.
      ' Returns:
      '		The NVP Collection object of the PreapprovalDetails call response.
      '--------------------------------------------------------------------------------------------------------------------------------------------
     */

    public function CallPreapprovalDetails($preapprovalKey) {
        /* Gather the information to make the PreapprovalDetails call.
          The array arynvp holds the name value pairs
         */

        // required fields
        $arynvp = array(
            "preapprovalKey" => $preapprovalKey
        );

        /* Make the PreapprovalDetails call to PayPal */
        $resArray = $this->callPayPal("PreapprovalDetails", $arynvp);

        /* Return the response array */
        return $resArray;
    }

    public function CancelPreapproval($preapprovalKey) {
        /* Gather the information to make the PreapprovalDetails call.
          The array arynvp holds the name value pairs
         */

        // required fields
        $arynvp = array(
            "preapprovalKey" => $preapprovalKey
        );

        /* Make the PreapprovalDetails call to PayPal */
        $resArray = $this->callPayPal("CancelPreapproval", $arynvp);

        /* Return the response array */
        return $resArray;
    }

    /*
      '-------------------------------------------------------------------------------------------------------------------------------------------
      ' Purpose: 	Prepares the parameters for the PaymentDetails API Call.
      '			The PaymentDetails call can be made with either
      '			a payKey, a trackingId, or a transactionId of a previously successful Pay call.
      ' Inputs:
      '
      ' Conditionally Required:
      '		One of the following:  payKey or transactionId or trackingId
      ' Returns:
      '		The NVP Collection object of the PaymentDetails call response.
      '--------------------------------------------------------------------------------------------------------------------------------------------
     */

    public function CallPaymentDetails($payKey, $transactionId, $trackingId) {
        /* Gather the information to make the PaymentDetails call.
          The array arynvp holds the name value pairs
         */

        $arynvp = array();

        // conditionally required fields
        if ("" != $payKey)
            $arynvp["payKey"] = $payKey;
        elseif ("" != $transactionId)
            $arynvp["transactionId"] = $transactionId;
        elseif ("" != $trackingId)
            $arynvp["trackingId"] = $trackingId;

        /* Make the PaymentDetails call to PayPal */
        $resArray = $this->callPayPal("PaymentDetails", $arynvp);

        /* Return the response array */
        return $resArray;
    }

    /*
      '-------------------------------------------------------------------------------------------------------------------------------------------
      ' Purpose: 	Prepares the parameters for the Refund API Call.
      '			The API credentials used in a Pay call can make the Refund call
      '			against a payKey, or a tracking id, or to specific receivers of a payKey or a tracking id
      '			that resulted from the Pay call
      '
      '			A receiver itself with its own API credentials can make a Refund call against the transactionId corresponding to their transaction.
      '			The API credentials used in a Pay call cannot use transactionId to issue a refund
      '			for a transaction for which they themselves were not the receiver
      '
      '			If you do specify specific receivers, keep in mind that you must provide the amounts as well
      '			If you specify a transactionId, then only the receiver of that transactionId is affected therefore
      '			the receiverEmailArray and receiverAmountArray should have 1 entry each if you do want to give a partial refund
      ' Inputs:
      '
      ' Conditionally Required:
      '		One of the following:  payKey or trackingId or trasactionId or
      '                              (payKey and receiverEmailArray and receiverAmountArray) or
      '                              (trackingId and receiverEmailArray and receiverAmountArray) or
      '                              (transactionId and receiverEmailArray and receiverAmountArray)
      ' Returns:
      '		The NVP Collection object of the Refund call response.
      '--------------------------------------------------------------------------------------------------------------------------------------------
     */

    public function CallRefund($payKey, $transactionId, $trackingId, $receiverEmailArray, $receiverAmountArray) {
        /* Gather the information to make the Refund call.
          The array avpary holds the name value pairs
         */

        $arynvp = array();

        // conditionally required fields
        if ("" != $payKey) {
            $arynvp["payKey"] = $payKey;
            if (0 != count($receiverEmailArray)) {
                reset($receiverEmailArray);
                while (list($key, $value) = each($receiverEmailArray)) {
                    if ("" != $value)
                        $arynvp["receiverList.receiver(" . $key . ").email"] = $value;
                }
            }
            if (0 != count($receiverAmountArray)) {
                reset($receiverAmountArray);
                while (list($key, $value) = each($receiverAmountArray)) {
                    if ("" != $value)
                        $arynvp["receiverList.receiver(" . $key . ").amount"] = $value;
                }
            }
        }
        elseif ("" != $trackingId) {
            $arynvp["trackingId"] = $trackingId;
            if (0 != count($receiverEmailArray)) {
                reset($receiverEmailArray);
                while (list($key, $value) = each($receiverEmailArray)) {
                    if ("" != $value)
                        $arynvp["receiverList.receiver(" . $key . ").email"] = $value;
                }
            }
            if (0 != count($receiverAmountArray)) {
                reset($receiverAmountArray);
                while (list($key, $value) = each($receiverAmountArray)) {
                    if ("" != $value)
                        $arynvp["receiverList.receiver(" . $key . ").amount"] = $value;
                }
            }
        }
        elseif ("" != $transactionId) {
            $arynvp["transactionId"] = $transactionId;
            // the caller should only have 1 entry in the email and amount arrays
            if (0 != count($receiverEmailArray)) {
                reset($receiverEmailArray);
                while (list($key, $value) = each($receiverEmailArray)) {
                    if ("" != $value)
                        $arynvp["receiverList.receiver(" . $key . ").email"] = $value;
                }
            }
            if (0 != count($receiverAmountArray)) {
                reset($receiverAmountArray);
                while (list($key, $value) = each($receiverAmountArray)) {
                    if ("" != $value)
                        $arynvp["receiverList.receiver(" . $key . ").amount"] = $value;
                }
            }
        }

        /* Make the Refund call to PayPal */
        $resArray = $this->callPayPal("Refund", $nvpstr);

        /* Return the response array */
        return $resArray;
    }

}

?>