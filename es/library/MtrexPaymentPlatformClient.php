<?php

/* * ************************************************************************************************
 * README
 *
 * This API has been developed for PHP versions 5.2.6 and above. While it may work with
 * earlier versions, they are not supported and running this API may result in unintended
 * consequences.
 *
 * This API requires the cURL PHP extension to be installed and enabled. If you are unsure
 * of your system configuration, please contact your server administrator or hosting company.
 * *********************************************************************************************** */


/*
 * The MtrexRequestMessage class serves as an input to the MtrexPaymentGateway
 * commands and stores the various fields necessary for processing a
 * transaction
 */

class MtrexRequestMessage {

    // $RequestFields stores the fields used to process a transaction
    public $RequestFields = array();

}

/*
 * The MtrexResponseMessage class serves as an output from the MtrexPaymentGateway
 * commands and stores the various fields that are returned from the gateway when
 * a command is executed
 */

class MtrexResponseMessage {

    // $ResponseFields stores the fields returned when a transaction is executed
    public $ResponseFields = array();
    // $Success is a boolean value that indicates if the transaction was executed
    // NOTE: This does not mean that the transaction itself was successful, but is an
    //       indicator as to whether or not the API code ran to completion
    public $Success;

}

/*
 * The MtrexHttpPost class serves as the backbone for the MtrexPaymentGateway and
 * provides methods for the execution and processing of transaction commands
 */

class MtrexHttpPost {

    // $MtrexUrl points to the processing script on Mtrex's server
    // NOTE: You can change this URL for testing purposes, but make sure that in any
    //       production environment it points to https://gateway.mtrex.com/omega.mp
    public static $MtrexUrl = 'https://gateway.mtrex.com/omega.mp';
    // $RequestFields and $ResponseFields are the internal copies of the parameters
    // and return values for a transaction
    protected $RequestFields = array();
    protected $ResponseFields = array();

    /*
     * Submits the transaction to the Mtrex server - this method should only be called
     * after setting $RequestFields, and in normal conditions, is only called from classes
     * that extend MtrexHttpPost such as MtrexPaymentGateway
     *
     * Parameters:
     *   none
     *
     * Returns:
     *   void
     */

    function SubmitHttpPost() {
        $this->ResponseFields = $this->SubmitHttpPost_aux($this->RequestFields);
    }

    /*
     * An auxillary function to facilitate HTTP POST submission - this should never be called
     * anywhere outside of MtrexHttpPost->SubmitHttpPost(). Also handles URL encoding of the
     * field names and values.
     *
     * Parameters:
     *   $requestFormFieldsToPost - The set of fields to post to the Mtrex gateway script.
     *       Preferrably in array form, but if not, it will attempt to parse the input into
     *       an array.
     *
     * Returns:
     *   An array containing the set of response fields
     */

    function SubmitHttpPost_aux($requestFormFieldsToPost) {
        $postdata = '';
        if (is_array($requestFormFieldsToPost)) {
            foreach ($requestFormFieldsToPost as $fieldName => $fieldValue) {
                $postdata .= urlencode($fieldName) . '=' . urlencode($fieldValue) . '&';
            }
        } else {
            $temparray = explode('&', $requestFormFieldsToPost);
            foreach ($temparray as &$value) {
                $buffer = explode('=', $value);
                $postdata .= urlencode($buffer[0]) . '=' . urlencode($buffer[1]) . '&';
            }
        }
        if (strlen($postdata) > 0) {
            $postdata = substr($postdata, 0, -1);
        }
        // Begin cURL extension calls
        $ch = curl_init(self::$MtrexUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        // End cURL extension calls
        $result_array = array();
        $temparray = explode('&', $result);
        foreach ($temparray as &$value) {
            $buffer = explode('=', $value);
            $result_array[urldecode($buffer[0])] = urldecode($buffer[1]);
        }
        return $result_array;
    }

}

/*
 * The MtrexPaymentGateway class provides a usable extension to the MtrexHttpPost class. It is
 * through this class that all transactions are processed.
 */

class MtrexPaymentGateway extends MtrexHttpPost {
    /*
     * Nothing to do here at the moment
     */

    function __construct() {
        
    }

    /*
     * Performs a Sale transaction on the Mtrex payment gateway
     *
     * Parameters:
     *   $request - An MtrexRequestMessage object that contains the fields for the sale transaction
     *
     * Returns:
     *   An MtrexResponseMessage object that contains the result given by the Mtrex Payment Gateway
     */

    function PerformSale($request) {
        $this->RequestFields = $request->RequestFields;
        $response = new MtrexResponseMessage();
        $response->Success = false;
        $this->SubmitHttpPost();
        $response->ResponseFields = $this->ResponseFields;
        $response->Success = true;
        return $response;
    }

    /*
     * Performs a Refund transaction on the Mtrex payment gateway
     * 
     * Parameters:
     *   $request - An MtrexRequestMessage object that contains the fields for the refund transaction
     *
     * Returns:
     *   An MtrexResponseMessage object that contains the result given by the Mtrex Payment Gateway
     */

    function PerformRefund($request) {
        $this->RequestFields = $request->RequestFields;
        $response = new MtrexResponseMessage();
        $response->Success = false;
        $this->SubmitHttpPost();
        $response->ResponseFields = $this->ResponseFields;
        $response->Success = true;
        return $response;
    }

    /*
     * Performs an Update transaction on the Mtrex payment gateway
     * 
     * Parameters:
     *   $request - An MtrexRequestMessage object that contains the fields for the update transaction
     *
     * Returns:
     *   An MtrexResponseMessage object that contains the result given by the Mtrex Payment Gateway
     */

    function PerformUpdate($request) {
        $this->RequestFields = $request->RequestFields;
        $response = new MtrexResponseMessage();
        $response->Success = false;
        $this->SubmitHttpPost();
        $response->ResponseFields = $this->ResponseFields;
        $response->Success = true;
        return $response;
    }

    /*
     * Performs an Inquiry transaction on the Mtrex payment gateway
     * 
     * Parameters:
     *   $request - An MtrexRequestMessage object that contains the fields for the inquiry transaction
     *
     * Returns:
     *   An MtrexResponseMessage object that contains the result given by the Mtrex Payment Gateway
     */

    function PerformInquiry($request) {
        $this->RequestFields = $request->RequestFields;
        $response = new MtrexResponseMessage();
        $response->Success = false;
        $this->SubmitHttpPost();
        $response->ResponseFields = $this->ResponseFields;
        $response->Success = true;
        return $response;
    }

}

?>