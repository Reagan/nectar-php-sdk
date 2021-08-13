<?php

namespace Nectar\Php\Sdk\Models;

class Token extends Base
{
    const TOKEN_PATH = "/v1/tokens";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function getToken(string $ref): string
    {
        $pathArgs = sprintf("ref=%s", $ref);
        return $this->get(self::TOKEN_PATH, $pathArgs);
    }

    public function generateElectricityToken(\Datetime $tokenId, int $amount, bool $isStid,
                                            int $randomNo, string $drn, string $configRef,
                                            bool $debug) {
        $params = array();
        $params['class'] = '0';
        $params['subclass'] = '0';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['amount'] = $amount;
        $params['random_no'] = $randomNo;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
        
        return $this->generateToken($params);
    }

    public function generateWaterToken(\Datetime $tokenId, int $amount, bool $isStid,
                                        int $randomNo, string $drn, string $configRef,
                                        bool $debug) {
        $params = array();
        $params['class'] = '0';
        $params['subclass'] = '1';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['amount'] = $amount;
        $params['random_no'] = $randomNo;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
        
        return $this->generateToken($params);
    }

    public function generateGasToken(\Datetime $tokenId, int $amount, bool $isStid,
                                    int $randomNo, string $drn, string $configRef,
                                    bool $debug) {
        $params = array();
        $params['class'] = '0';
        $params['subclass'] = '2';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['amount'] = $amount;
        $params['random_no'] = $randomNo;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
                                    
        return $this->generateToken($params);
    }

    public function generateInitiateMeterTestDisplay10Token(\Datetime $tokenId, string $control,
                                                            int $manufacturerCode, bool $isStid,
                                                            string $drn, string $configRef,
                                                            bool $debug) {
        $params = array();
        $params['class'] = '1';
        $params['subclass'] = '0';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['control'] = $control;
        $params['manufacturer_code'] = $manufacturerCode;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
                                                                
        return $this->generateToken($params);
    }

    public function generateInitiateMeterTestDisplay11Token(\Datetime $tokenId, string $control,
                                                            int $manufacturerCode, bool $isStid,
                                                            string $drn, string $configRef,
                                                            bool $debug) {
        $params = array();
        $params['class'] = '1';
        $params['subclass'] = '1';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['control'] = $control;
        $params['manufacturer_code'] = $manufacturerCode;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
                                                                
        return $this->generateToken($params);
    }

    public function generateSetMaximumPowerLimitToken(\Datetime $tokenId, int $maximumPowerLimit,
                                                        int $randomNo, bool $isStid,
                                                        string $drn, string $configRef,
                                                        bool $debug) {
        $params = array();
        $params['class'] = '2';
        $params['subclass'] = '0';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['maximum_power_limit'] = $maximumPowerLimit;
        $params['random_no'] = $randomNo;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
                                                                
        return $this->generateToken($params);
    }

    public function generateClearCreditToken(\Datetime $tokenId, int $register,
                                            int $randomNo, bool $isStid,
                                            string $drn, string $configRef,
                                            bool $debug) {
        $params = array();
        $params['class'] = '2';
        $params['subclass'] = '1';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['register'] = $register;
        $params['random_no'] = $randomNo;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
                                                                                                        
        return $this->generateToken($params);
    }

    public function generateSetTariffRateToken(\Datetime $tokenId, int $tariffRate,
                                                int $randomNo, bool $isStid,
                                                string $drn, string $configRef,
                                                bool $debug) {
        $params = array();
        $params['class'] = '2';
        $params['subclass'] = '2';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['tariff_rate'] = $tariffRate;
        $params['random_no'] = $randomNo;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
                                                                                                            
        return $this->generateToken($params);
    }

    public function generateSet1stSectionDecoderKeyToken(\Datetime $tokenId, string $newVendingKey,
                                                            string $newSupplyGroupCode, string $newTariffIndex,
                                                            int $newKeyRevisionNo, int $newKeyType, int $newKeyExpiryNo,
                                                            string $newDrn, string $newIssuerIdentificationNo, int $ro,
                                                            bool $isStid, string $drn, string $configRef,
                                                            bool $debug) {
        $params = array();
        $params['class'] = '2';
        $params['subclass'] = '3';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['new_vending_key'] = $newVendingKey;
        $params['new_supply_group_code'] = $newSupplyGroupCode;
        $params['new_tariff_index'] = $newTariffIndex ;
        $params['new_key_revision_no'] = $newKeyRevisionNo;
        $params['new_key_type'] = $newKeyType;
        $params['new_key_expiry_no'] = $newKeyExpiryNo;
        $params['new_drn'] = $newDrn;
        $params['new_issuer_identification_no'] = $newIssuerIdentificationNo;
        $params['ro'] = $ro;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
                                                                                                                    
        return $this->generateToken($params);
    }

    public function generateSet2ndSectionDecoderKeyToken(\Datetime $tokenId, string $newVendingKey,
                                                        string $newSupplyGroupCode, string $newTariffIndex,
                                                        int $newKeyRevisionNo, int $newKeyType, int $newKeyExpiryNo,
                                                        string $newDrn, string $newIssuerIdentificationNo, int $ro,
                                                        bool $isStid, string $drn, string $configRef,
                                                        bool $debug) {
        $params = array();
        $params['class'] = '2';
        $params['subclass'] = '4';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['new_vending_key'] = $newVendingKey;
        $params['new_supply_group_code'] = $newSupplyGroupCode;
        $params['new_tariff_index'] = $newTariffIndex ;
        $params['new_key_revision_no'] = $newKeyRevisionNo;
        $params['new_key_type'] = $newKeyType;
        $params['new_key_expiry_no'] = $newKeyExpiryNo;
        $params['new_drn'] = $newDrn;
        $params['new_issuer_identification_no'] = $newIssuerIdentificationNo;
        $params['ro'] = $ro;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
                                                                                                                    
        return $this->generateToken($params);
    }

    public function generateClearTamperConditionToken(\Datetime $tokenId, int $pad,
                                                        int $randomNo, bool $isStid,
                                                        string $drn, string $configRef,
                                                        bool $debug) {
        $params = array();
        $params['class'] = '2';
        $params['subclass'] = '5';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['pad'] = $pad;
        $params['random_no'] = $randomNo;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
                                                                                                                    
        return $this->generateToken($params);
    }

    public function generateSetMaximumPhasePowerUnbalanceLimitToken(\Datetime $tokenId,
                                                                    int $mppul, int $randomNo,
                                                                    bool $isStid, string $drn,
                                                                    string $configRef, bool $debug) {
        $params = array();
        $params['class'] = '2';
        $params['subclass'] = '6';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['mppul'] = $mppul;
        $params['random_no'] = $randomNo;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
                                                                                                                                
        return $this->generateToken($params);
    }

    public function generateSetWaterMeterFactorToken(\Datetime $tokenId, int $wmFactor,
                                                    int $randomNo, bool $isStid,
                                                    string $drn, string $configRef,
                                                    bool $debug) {
        $params = array();
        $params['class'] = '2';
        $params['subclass'] = '7';
        $params['token_id'] = $this->formatDate($tokenId);
        $params['wm_factor'] = $wmFactor;
        $params['random_no'] = $randomNo;
        $params['is_stid'] = $isStid;
        $params['drn'] = $drn;
        $params['config_ref'] = $configRef;
        $params['debug'] = $debug;
                                                                                                                
        
        return $this->generateToken($params);
    }

    private function formatDate(\Datetime $dt) : string 
    {
        return $dt->format('Y-m-d\TH:i');
    }

    private function generateToken(array $params): string
    {
        $payload = $this->createPayload($params);
        return $this->post(self::TOKEN_PATH, $payload);
    }
}