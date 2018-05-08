<?php 
class DB_Reports {
    private $conn;
    // constructor
    function __construct() {
        require_once "../../".DIR_INCLUDE.'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    // destructor
    function __destruct() {
        
    }
   
    /**
     * Get user all ads
     */
    public function getUserallads($userId) {
        $stmt = $this->conn->prepare("SELECT count(adId) as all_ads FROM ads WHERE userId =?");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {			
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
			return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user all native ads
     */
    public function getUserNativeads($userId) {
        $stmt = $this->conn->prepare("SELECT count(adId) as all_ads FROM ads WHERE userId =? AND adtype='Native' ");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user all native adcodes
     */
    public function getUserNativeadcodes($userId) {
        $stmt = $this->conn->prepare("SELECT count(adcodeId) as all_adcodes FROM adcodes WHERE userId =? AND adcode_type='Native'");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }
    
    /**
     * Get user all POP ads
     */
    public function getUserPOPads($userId) {
        $stmt = $this->conn->prepare("SELECT count(adId) as all_ads FROM ads WHERE userId =? AND adtype='POP' ");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user all POP adcodes
     */
    public function getUserPOPadcodes($userId) {
        $stmt = $this->conn->prepare("SELECT count(adcodeId) as all_adcodes FROM adcodes WHERE userId =? AND adcode_type='POP'");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }
    /**
     * Get user active ads
     */
    public function getUseractiveNativeads($userId) {
        $stmt = $this->conn->prepare("SELECT count(adId) as active_ads FROM ads WHERE userId =? and status=2 and adtype='Native' ");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user POP ads
     */
    public function getUseractivePOPads($userId) {
        $stmt = $this->conn->prepare("SELECT count(adId) as active_ads FROM ads WHERE userId =? and status=2 and adtype='POP' ");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user pending ads for POP
     */
    public function getUserpendingNativeads($userId) {
        $stmt = $this->conn->prepare("SELECT count(adId) as pending_ads FROM ads WHERE userId =? and status=-1 and adtype='Native' ");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user pending ads for POP
     */
    public function getUserpendingPOPads($userId) {
        $stmt = $this->conn->prepare("SELECT count(adId) as pending_ads FROM ads WHERE userId =? and status=-1 and adtype='POP' ");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user blocked ads for POP
     */
    public function getUserblockedNativeads($userId) {
        $stmt = $this->conn->prepare("SELECT count(adId) as blocked_ads FROM ads WHERE userId =? and status=0 and adtype='Native' ");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user blocked ads for POP
     */
    public function getUserblockedPOPads($userId) {
        $stmt = $this->conn->prepare("SELECT count(adId) as blocked_ads FROM ads WHERE userId =? and status=0 and adtype='POP' ");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user adformat for POP
     */
    public function getUserAdFormatNativeads($userId) {
        $stmt = $this->conn->prepare("SELECT count(adId) as text_ads FROM ads WHERE userId =? and adformat=11 and adtype='Native' ");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user adformat for POP
     */
    public function getUserBannerFormatNativeads($userId) {
        $stmt = $this->conn->prepare("SELECT count(adId) as banner_ads FROM ads WHERE userId =? and adformat='' and adtype='Native' ");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user adformat for POP
     */
    public function getUserAdFormatPOPads($userId) {
        $stmt = $this->conn->prepare("SELECT count(adId) as text_ads FROM ads WHERE userId =? and adformat=11 and adtype='POP' ");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get ad impressions
     */
    public function getadsimpressions() {
        $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily WHERE impressions=1");
        if ($stmt->execute()) {			
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
			return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get ad clicks
     */
    public function getadsclicks() {
        $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily WHERE clicks=1");
        if ($stmt->execute()) {			
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
			return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get native ad impressions for specific user
     */
    public function getNativeadsimpressions($userId, $duration, $customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and MONTH(date)=MONTH(NOW()) ");
        else if($duration == "3")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and YEAR(date)=YEAR(NOW())");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =?");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =?");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get native ad impressions for specific user adcode
     */
    public function getNativeadcodesimpressions($userId, $duration, $customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes, layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='Native' and adcodes.userId =? and date = CURDATE() GROUP BY layout");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes, layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='Native' and adcodes.userId =? and MONTH(date)=(MONTH(NOW()) - 1) GROUP BY layout");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes, layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='Native' and adcodes.userId =? and date = CURDATE()-1 GROUP BY layout");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes, layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='Native' and adcodes.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) GROUP BY layout");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes, layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='Native' and adcodes.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) GROUP BY layout");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes, layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='Native' and adcodes.userId =? and MONTH(date)=MONTH(NOW()) GROUP BY layout");
        else if($duration == "3")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes, layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='Native' and adcodes.userId =? and YEAR(date)=YEAR(NOW()) GROUP BY layout");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes, layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='Native' and adcodes.userId =? and (date between '$startdate' and '$todate') GROUP BY layout");
            } else {
                $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes, layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='Native' and adcodes.userId =? GROUP BY layout");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes, layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='Native' and adcodes.userId =? GROUP BY layout");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }
    
    /**
     * Get POP ad impressions for specific user
     */
    public function getPOPadsimpressions($userId, $duration,$customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and MONTH(date)=MONTH(NOW()) ");
        else if($duration == "3")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and YEAR(date)=YEAR(NOW())");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? ");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get POP ad impressions for specific user
     */
    public function getPOPadcodesimpressions($userId, $duration,$customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='POP' and adcodes.userId =? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='POP' and adcodes.userId =? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='POP' and adcodes.userId =? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='POP' and adcodes.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='POP' and adcodes.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='POP' and adcodes.userId =? and MONTH(date)=MONTH(NOW()) ");
        else if($duration == "3")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='POP' and adcodes.userId =? and YEAR(date)=YEAR(NOW())");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='POP' and adcodes.userId =? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='POP' and adcodes.userId =? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type='POP' and adcodes.userId =?");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }
    
    /**
     * Get user all ads(details)
     */
    public function getAllads($userId, $topAdduration, $customdate) {
        if($topAdduration == "1")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.userId=? and date = CURDATE() GROUP BY ads.adId");
        else if($topAdduration == "2")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.userId=? and MONTH(date)=(MONTH(NOW()) - 1) GROUP BY ads.adId");
        else if ($topAdduration == "6")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.userId=? and (date = CURDATE()-1) GROUP BY ads.adId");
        else if ($topAdduration == "7")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.userId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) GROUP BY ads.adId ");
        else if ($topAdduration == "8")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.userId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) GROUP BY ads.adId ");
        else if ($topAdduration == "9")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.userId=? and MONTH(date)=MONTH(NOW()) GROUP BY ads.adId ");
        else if($topAdduration == "3")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.userId=? and YEAR(date)=YEAR(NOW()) GROUP BY ads.adId");
        else if($topAdduration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.userId=? and (date between '$startdate' and '$todate') GROUP BY ads.adId");
            } else {
                $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.userId=? GROUP BY ads.adId");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.userId=? GROUP BY ads.adId");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }


    /**
     * Get user all native ads(details)
     */
    public function getAllNativeads($userId, $topAdduration, $customdate) {
        if($topAdduration == "1")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? and date = CURDATE() GROUP BY ads.adId");
        else if($topAdduration == "2")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? and MONTH(date)=(MONTH(NOW()) - 1) GROUP BY ads.adId");
        else if ($topAdduration == "6")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? and date = CURDATE()-1 GROUP BY ads.adId ");
        else if ($topAdduration == "7")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) GROUP BY ads.adId ");
        else if ($topAdduration == "8")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) GROUP BY ads.adId ");
        else if ($topAdduration == "9")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? and MONTH(date)=MONTH(NOW()) GROUP BY ads.adId ");
        else if($topAdduration == "3")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? and YEAR(date)=YEAR(NOW()) GROUP BY ads.adId");
        else if ($topAdduration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? and (date between '$startdate' and '$todate') GROUP BY ads.adId");
            } else {
                $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? GROUP BY ads.adId");
            }
        } else 
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? GROUP BY ads.adId");

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user all native adcodes(details)
     */
    public function getAllNativeadcodes($userId, $topAdduration, $customdate) {
        if($topAdduration == "1")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent),layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId=? and date = CURDATE() and wp=0 GROUP BY adcodes.adcodeId");
        else if($topAdduration == "2")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent),layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId=? and MONTH(date)=(MONTH(NOW()) - 1) and wp=0 GROUP BY adcodes.adcodeId");
        else if ($topAdduration == "6")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent),layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId=? and date = CURDATE()-1 and wp=0 GROUP BY adcodes.adcodeId");
        else if ($topAdduration == "7")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent),layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) and wp=0 GROUP BY adcodes.adcodeId");
        else if ($topAdduration == "8")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent),layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) and wp=0 GROUP BY adcodes.adcodeId ");
        else if ($topAdduration == "9")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent),layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId=? and MONTH(date)=MONTH(NOW()) and wp=0 GROUP BY adcodes.adcodeId ");
        else if($topAdduration == "3")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent),layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId=? and YEAR(date)=YEAR(NOW()) and wp=0 GROUP BY adcodes.adcodeId");
        else if ($topAdduration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent),layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId=?  and (date between '$startdate' and '$todate') and wp=0 GROUP BY adcodes.adcodeId");
            } else {
                $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent),layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId=?  GROUP BY ads.adId");
            }
        } else 
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(clicks), COUNT(conversion), SUM(money_spent),layout FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId=? and wp=0 GROUP BY adcodes.adcodeId");

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }
    
    /**
     * Get user all POP ads(details)
     */
    public function getAllPOPads($userId, $topAdduration, $customdate) {
        if($topAdduration == "1")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=? and date = CURDATE() GROUP BY ads.adId");
        else if($topAdduration == "2")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=? and MONTH(date)=(MONTH(NOW()) - 1) GROUP BY ads.adId");
        else if ($topAdduration == "6")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=? and date = CURDATE()-1 GROUP BY ads.adId ");
        else if ($topAdduration == "7")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) GROUP BY ads.adId ");
        else if ($topAdduration == "8")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) GROUP BY ads.adId ");
        else if ($topAdduration == "9")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=? and MONTH(date)=MONTH(NOW()) GROUP BY ads.adId ");
        else if($topAdduration == "3")
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=? and YEAR(date)=YEAR(NOW()) GROUP BY ads.adId");
        else if($topAdduration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=? and (date between '$startdate' and '$todate') GROUP BY ads.adId");
            } else {
                $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=?  GROUP BY ads.adId");
            }
        } else
            $stmt = $this->conn->prepare("SELECT ads.adId,ads.name as name, ads.adtype as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=?  GROUP BY ads.adId");

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get user all POP adcodes(details)
     */
    public function getAllPOPadcodes($userId, $topAdduration, $customdate) {
        if($topAdduration == "1")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId=? and date = CURDATE() and wp=0 GROUP BY adcodes.adcodeId");
        else if($topAdduration == "2")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId=? and MONTH(date)=(MONTH(NOW()) - 1) and wp=0 GROUP BY adcodes.adcodeId");
        else if ($topAdduration == "6")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId=? and date = CURDATE()-1 and wp=0 GROUP BY adcodes.adcodeId ");
        else if ($topAdduration == "7")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) and wp=0 GROUP BY adcodes.adcodeId ");
        else if ($topAdduration == "8")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) and wp=0 GROUP BY adcodes.adcodeId ");
        else if ($topAdduration == "9")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adtype as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId=? and MONTH(date)=MONTH(NOW()) and wp=0 GROUP BY adcodes.adcodeId ");
        else if($topAdduration == "3")
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId=? and YEAR(date)=YEAR(NOW()) and wp=0 GROUP BY adcodes.adcodeId");
        else if($topAdduration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId=? and (date between '$startdate' and '$todate') and wp=0 GROUP BY adcodes.adcodeId");
            } else {
                $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId=?  and wp=0 GROUP BY adcodes.adcodeId");
            }
        } else
            $stmt = $this->conn->prepare("SELECT adcodes.adcodeId,adcodes.name as name, adcodes.adcode_type as type, SUM(impressions), SUM(money_spent) FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcodetype='POP' and adcodes.userId=?  and wp=0 GROUP BY adcodes.adcodeId");

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }
    
    /**
     * Get Native ad impressions for specific user
     */
    public function getNativeadsclicks($userId, $duration,$customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and MONTH(date)=MONTH(NOW()) ");
        else if($duration == "3")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and YEAR(date)=YEAR(NOW())");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId=? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId=? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId=? ");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get Native ad impressions for specific user
     */
    public function getNativeadcodesclicks($userId, $duration,$customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='Native' and adcodes.userId =? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='Native' and adcodes.userId =? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='Native' and adcodes.userId =? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='Native' and adcodes.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='Native' and adcodes.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='Native' and adcodes.userId =? and MONTH(date)=MONTH(NOW()) ");
        else if($duration == "3")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='Native' and adcodes.userId =? and YEAR(date)=YEAR(NOW())");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='Native' and adcodes.userId =? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='Native' and adcodes.userId =?");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='Native' and adcodes.userId =?");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }
    
    
    /**
     * Get POP ad impressions for specific user
     */
    public function getPOPadsclicks($userId, $duration,$customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and MONTH(date)=MONTH(NOW()) ");
        else if($duration == "3")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? ");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

/**
     * Get POP ad impressions for specific user
     */
    public function getPOPadcodesclicks($userId, $duration,$customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='POP' and adcodes.userId =? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='POP' and adcodes.userId =? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='POP' and adcodes.userId =? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='POP' and adcodes.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='POP' and adcodes.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='POP' and adcodes.userId =? and MONTH(date)=MONTH(NOW()) ");
        else if($duration == "3")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='POP' and adcodes.userId =? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='POP' and adcodes.userId =? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='POP' and adcodes.userId =? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_adcodes FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type='POP' and adcodes.userId =? ");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }
    
    /**
     * Get Native ad Profit for specific user
     */
    public function getNativeadsProfit($userId, $duration, $customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and MONTH(date)=MONTH(NOW()) ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? ");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

  
    /**
     * Get Native adcodes Profit for specific user
     */
    public function getNativeadcodesProfit($userId, $duration, $customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId =? and date = CURDATE()");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId =? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId =? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId =? and MONTH(date)=MONTH(NOW()) ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId =? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId =? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId =?");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='Native' and adcodes.userId =?");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }
    
    
    
    /**
     * Get POP ad Profit for specific user
     */
    public function getPOPadsProfit($userId, $duration, $customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and MONTH(date)=MONTH(NOW()) ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? ");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get POP adcode Profit for specific user
     */
    public function getPOPadcodesProfit($userId, $duration, $customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId =? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId =? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId =? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId =? and MONTH(date)=MONTH(NOW()) ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId =? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId =? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId =? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type='POP' and adcodes.userId =? ");
        }

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }
    
    /**
     * Get ad impressions by UserId and adId
     */
    public function getadsImpressionsbyId($userId, $adId, $duration, $adtype, $customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype=? and ads.userId =? and ads.adId=? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype=? and ads.userId =? and ads.adId=? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype=? and ads.userId =? and ads.adId=? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype=? and ads.userId =? and ads.adId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype=? and ads.userId =? and ads.adId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype=? and ads.userId =? and ads.adId=? and MONTH(date)=MONTH(NOW()) ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype=? and ads.userId =? and ads.adId=? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype=? and ads.userId =? and ads.adId=? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype=? and ads.userId =? and ads.adId=? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype=? and ads.userId =? and ads.adId=? ");
        }

        $stmt->bind_param("sii", $adtype, $userId, $adId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get ad clicks by UserId and adId
     */
    public function getadsClicksbyId($userId, $adId, $duration, $adtype, $customdate) {
         if($duration == "1")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype=? and ads.userId =? and ads.adId=? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype=? and ads.userId =? and ads.adId=? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype=? and ads.userId =? and ads.adId=? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype=? and ads.userId =? and ads.adId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype=? and ads.userId =? and ads.adId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype=? and ads.userId =? and ads.adId=? and MONTH(date)=MONTH(NOW()) ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype=? and ads.userId =? and ads.adId=? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype=? and ads.userId =? and ads.adId=? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype=? and ads.userId =? and ads.adId=? ");
            }
        } else
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype=? and ads.userId =? and ads.adId=? ");

        $stmt->bind_param("sii", $adtype, $userId, $adId);
        if ($stmt->execute()) {         
            $clicks = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $clicks; 
        } else {
            return 0;
        }
    }

    /**
     * Get spent money by UserId and adId
     */
    public function getadsSpentMoneybyId($userId, $adId, $duration, $adtype, $customdate) {
         if($duration == "1")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype=? and ads.userId =? and ads.adId=? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype=? and ads.userId =? and ads.adId=? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype=? and ads.userId =? and ads.adId=? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype=? and ads.userId =? and ads.adId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype=? and ads.userId =? and ads.adId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype=? and ads.userId =? and ads.adId=? and MONTH(date)=MONTH(NOW()) ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype=? and ads.userId =? and ads.adId=? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype=? and ads.userId =? and ads.adId=? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype=? and ads.userId =? and ads.adId=? ");
            }
        } else
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype=? and ads.userId =? and ads.adId=? ");

        $stmt->bind_param("sii", $adtype, $userId, $adId);
        if ($stmt->execute()) {
            $clicks = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $clicks; 
        } else {
            return 0;
        }
    }

    /**
     * Get adcodes impressions by UserId and adcodeId
     */
    public function getadcodesImpressionsbyId($userId, $adcodeId, $duration, $adcode_type, $customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and MONTH(date)=MONTH(NOW()) ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE impressions=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? ");
        }

        $stmt->bind_param("sii", $adcode_type, $userId, $adcodeId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get adcodes clicks by UserId and adcodeId
     */
    public function getadcodesClicksbyId($userId, $adcodeId, $duration, $adcode_type, $customdate) {
         if($duration == "1")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and MONTH(date)=MONTH(NOW()) ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? ");
            }
        } else 
            $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE clicks=1 and adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? ");

        $stmt->bind_param("sii", $adcode_type, $userId, $adcodeId);
        if ($stmt->execute()) {         
            $clicks = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $clicks; 
        } else {
            return 0;
        }
    }

    /**
     * Get spent money by UserId and adcodeId
     */
    public function getadcodesSpentMoneybyId($userId, $adcodeId, $duration, $adcode_type, $customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and MONTH(date)=MONTH(NOW()) ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_ad_daily INNER JOIN adcodes ON stats_ad_daily.adcodeId=adcodes.adcodeId WHERE adcodes.adcode_type=? and adcodes.userId =? and adcodes.adcodeId=? ");
        }

        $stmt->bind_param("sii", $adcode_type, $userId, $adcodeId);
        if ($stmt->execute()) {
            $clicks = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $clicks; 
        } else {
            return 0;
        }
    }

    /**
     * Get date list for available date
     */
    public function getavailableDates() {
        $stmt = $this->conn->prepare("SELECT COUNT(*), date, userIP FROM stats_ad_daily GROUP BY date,userIP ORDER BY date");
        if ($stmt->execute()) {
            $result = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $result; 
        } else {
            return NULL;
        }
    }

    /**
     * Get all stats_ad_daily list
     */
    public function getallAdStats($adId) {
        if(!$adId) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_ad_daily");
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM stats_ad_daily WHERE adId=?");
            $stmt->bind_param("i", $adId);
        }
        if ($stmt->execute()) {
            $result = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $result; 
        } else {
            return NULL;
        }
    }

    /**
     * Get all stats_ad_daily list
     */
    public function getallOSStats($adId) {
        if(!$adId) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_os_daily GROUP BY osId,statsId ORDER BY osId");
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM stats_os_daily WHERE adId=? GROUP BY osId,statsId ORDER BY osId");
            $stmt->bind_param("i", $adId);
        }

        if ($stmt->execute()) {
            $result = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $result; 
        } else {
            return NULL;
        }
    }

    /**
     * Get all browser stats
     */
    public function getallBrowserStats($adId) {
        if(!$adId) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_browser_daily GROUP BY browserId,statsId ORDER BY browserId");
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM stats_browser_daily WHERE adId=? GROUP BY browserId,statsId ORDER BY browserId");
            $stmt->bind_param("i", $adId);
        }
        if ($stmt->execute()) {
            $result = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $result; 
        } else {
            return NULL;
        }
    }

    /**
     * Get os impressions by osId
     */
    public function getosImpressionsbyId($osId) {

        $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_os_daily WHERE impressions=1 and osId=? ");

        $stmt->bind_param("i", $osId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get os clicks by osId
     */
    public function getosClicksbyId($osId) {

        $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_os_daily WHERE clicks=1 and osId=? ");

        $stmt->bind_param("i", $osId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get os total spent money by osId
     */
    public function getosSpentMoneybyId($osId) {

        $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_os_daily WHERE osId=? ");

        $stmt->bind_param("i", $osId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }


    /**
     * Get browser impressions by browserId
     */
    public function getbrImpressionsbyId($browserId) {

        $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_browser_daily WHERE impressions=1 and browserId=? ");

        $stmt->bind_param("i", $browserId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get browser clicks by osId
     */
    public function getbrClicksbyId($browserId) {

        $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_browser_daily WHERE clicks=1 and browserId=? ");

        $stmt->bind_param("i", $browserId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get browser total spent money by osId
     */
    public function getbrSpentMoneybyId($browserId) {

        $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_browser_daily WHERE browserId=? ");

        $stmt->bind_param("i", $browserId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get all language stats
     */
    public function getallLanguageStats($adId) {
        if(!$adId) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_language_daily GROUP BY languageId,statsId ORDER BY languageId");
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM stats_language_daily WHERE adId=? GROUP BY languageId,statsId ORDER BY languageId");
            $stmt->bind_param("i", $adId);
        }
        if ($stmt->execute()) {
            $result = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $result; 
        } else {
            return NULL;
        }
    }

    /**
     * Get language impressions by languageId
     */
    public function getlanguageImpressionsbyId($languageId) {

        $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_language_daily WHERE impressions=1 and languageId=? ");

        $stmt->bind_param("i", $languageId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get language clicks by osId
     */
    public function getlanguageClicksbyId($languageId) {

        $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_language_daily WHERE clicks=1 and languageId=? ");

        $stmt->bind_param("i", $languageId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get language total spent money by languageId
     */
    public function getlanguageSpentMoneybyId($languageId) {

        $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_language_daily WHERE languageId=? ");

        $stmt->bind_param("i", $languageId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get all category stats
     */
    public function getallCategoryStats($adId) {
        if(!$adId) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_category_daily GROUP BY categoryId,statsId ORDER BY categoryId");
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM stats_category_daily WHERE adId=? GROUP BY categoryId,statsId ORDER BY categoryId");
            $stmt->bind_param("i", $adId);
        }

        if ($stmt->execute()) {
            $result = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $result; 
        } else {
            return NULL;
        }
    }

    /**
     * Get category impressions by categoryId
     */
    public function getcategoryImpressionsbyId($categoryId) {

        $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_category_daily WHERE impressions=1 and categoryId=? ");

        $stmt->bind_param("i", $categoryId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get category clicks by categoryId
     */
    public function getcategoryClicksbyId($categoryId) {

        $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_category_daily WHERE clicks=1 and categoryId=? ");

        $stmt->bind_param("i", $categoryId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get category total spent money by categoryId
     */
    public function getcategorySpentMoneybyId($categoryId) {

        $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_category_daily WHERE categoryId=? ");

        $stmt->bind_param("i", $categoryId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get all site stats
     */
    public function getallsiteStats($adId) {
        if(!$adId) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_site_daily GROUP BY siteId,statsId ORDER BY siteId");
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM stats_site_daily WHERE adId=? GROUP BY siteId,statsId ORDER BY siteId");
            $stmt->bind_param("i", $adId);
        }

        if ($stmt->execute()) {
            $result = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $result; 
        } else {
            return NULL;
        }
    }

    /**
     * Get all site stats by date
     */
    public function getallsiteStatsByDate($duration, $customdate) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT SUM(impressions),SUM(clicks),SUM(money_spent),SUM(conversion),siteId FROM stats_site_daily WHERE date = CURDATE() GROUP BY siteId ORDER BY siteId");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT SUM(impressions),SUM(clicks),SUM(money_spent),SUM(conversion),siteId FROM stats_site_daily WHERE MONTH(date)=(MONTH(NOW()) - 1) GROUP BY siteId ORDER BY siteId ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT SUM(impressions),SUM(clicks),SUM(money_spent),SUM(conversion),siteId FROM stats_site_daily WHERE (date = CURDATE()-1) GROUP BY siteId ORDER BY siteId ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT SUM(impressions),SUM(clicks),SUM(money_spent),SUM(conversion),siteId FROM stats_site_daily WHERE date >= DATE_SUB(NOW(), INTERVAL 3 DAY) GROUP BY siteId ORDER BY siteId ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT SUM(impressions),SUM(clicks),SUM(money_spent),SUM(conversion),siteId FROM stats_site_daily WHERE date >= DATE_SUB(NOW(), INTERVAL 7 DAY) GROUP BY siteId ORDER BY siteId ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT SUM(impressions),SUM(clicks),SUM(money_spent),SUM(conversion),siteId FROM stats_site_daily WHERE MONTH(date)=MONTH(NOW()) GROUP BY siteId ORDER BY siteId ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT SUM(impressions),SUM(clicks),SUM(money_spent),SUM(conversion),siteId FROM stats_site_daily WHERE YEAR(date)=YEAR(NOW()) GROUP BY siteId ORDER BY siteId ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT SUM(impressions),SUM(clicks),SUM(money_spent),SUM(conversion),siteId FROM stats_site_daily WHERE (date between '$startdate' and '$todate') GROUP BY siteId ORDER BY siteId ");
            } else {
                $stmt = $this->conn->prepare("SELECT SUM(impressions),SUM(clicks),SUM(money_spent),SUM(conversion),siteId FROM stats_site_daily GROUP BY siteId ORDER BY siteId ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT SUM(impressions),SUM(clicks),SUM(money_spent),SUM(conversion),siteId FROM stats_site_daily GROUP BY siteId ORDER BY siteId ");
        }

        if ($stmt->execute()) {
            $result = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $result; 
        } else {
            return NULL;
        }
    }

    /**
     * Get site impressions by siteId
     */
    public function getsiteImpressionsbyId($siteId) {

        $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_site_daily WHERE impressions=1 and siteId=? ");

        $stmt->bind_param("i", $siteId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get site clicks by siteId
     */
    public function getsiteClicksbyId($siteId) {
        $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_site_daily WHERE clicks=1 and siteId=? ");
        $stmt->bind_param("i", $siteId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }
    
    /**
     * Get site total spent money by siteId
     */
    public function getsiteSpentMoneybyId($siteId) {

        $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_site_daily WHERE siteId=? ");

        $stmt->bind_param("i", $siteId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get all connection stats
     */
    public function getallconnectionStats($adId) {
        if(!$adId) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_connection_daily GROUP BY connectionId,statsId ORDER BY connectionId");
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM stats_connection_daily WHERE adId=? GROUP BY connectionId,statsId ORDER BY connectionId");
            $stmt->bind_param("i", $adId);
        }

        if ($stmt->execute()) {
            $result = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $result; 
        } else {
            return NULL;
        }
    }

    /**
     * Get connection impressions by connectionId
     */
    public function getconnectionImpressionsbyId($connectionId) {

        $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_connection_daily WHERE impressions=1 and connectionId=? ");

        $stmt->bind_param("i", $connectionId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get connection clicks by connectionId
     */
    public function getconnectionClicksbyId($connectionId) {

        $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_connection_daily WHERE clicks=1 and connectionId=? ");

        $stmt->bind_param("i", $connectionId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get connection total spent money by connectionId
     */
    public function getconnectionSpentMoneybyId($connectionId) {

        $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_connection_daily WHERE connectionId=? ");

        $stmt->bind_param("i", $connectionId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get all isp stats
     */
    public function getallispStats($adId) {
        if(!$adId) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_isp_daily GROUP BY ispId,statsId ORDER BY ispId");
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM stats_isp_daily WHERE adId=? GROUP BY ispId,statsId ORDER BY ispId");
            $stmt->bind_param("i", $adId);
        }

        if ($stmt->execute()) {
            $result = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $result; 
        } else {
            return NULL;
        }
    }

    /**
     * Get isp impressions by ispId
     */
    public function getispImpressionsbyId($ispId) {

        $stmt = $this->conn->prepare("SELECT sum(impressions) as impressions FROM stats_isp_daily WHERE impressions=1 and ispId=? ");

        $stmt->bind_param("i", $ispId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get isp clicks by ispId
     */
    public function getispClicksbyId($ispId) {

        $stmt = $this->conn->prepare("SELECT sum(clicks) as clicks FROM stats_isp_daily WHERE clicks=1 and ispId=? ");

        $stmt->bind_param("i", $ispId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get isp total spent money by ispId
     */
    public function getispSpentMoneybyId($ispId) {

        $stmt = $this->conn->prepare("SELECT sum(money_spent) as money_spent FROM stats_isp_daily WHERE ispId=? ");

        $stmt->bind_param("i", $ispId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 0;
        }
    }

    /**
     * Get advertiser balance by userId
     */
    public function getuserbalance($userId) {

        $stmt = $this->conn->prepare("SELECT adv_balance,pub_balance FROM users WHERE userId=?");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {         
            $balance = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $balance; 
        } else {
            return 0;
        }
    }

    /**
     * Get native ad by date(details)
     */
    public function getVisualNativeDataForGraph($userId, $date, $topAdduration) {
        if($topAdduration == 3) {
            $stmt = $this->conn->prepare("SELECT SUM(impressions) as impressions, SUM(clicks) as clicks, COUNT(conversion), SUM(money_spent) as spend FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? and YEAR(date)=year(?) AND MONTH(date)=month(?) GROUP BY ads.adId");
            $stmt->bind_param("iss", $userId, $date, $date);
        } else if ($topAdduration == 4) {
            $stmt = $this->conn->prepare("SELECT SUM(impressions) as impressions, SUM(clicks) as clicks, COUNT(conversion), SUM(money_spent) as spend FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? and YEAR(date)=? GROUP BY ads.adId");
            $stmt->bind_param("is", $userId, $date);
        } else {
            $stmt = $this->conn->prepare("SELECT SUM(impressions) as impressions, SUM(clicks) as clicks, COUNT(conversion), SUM(money_spent) as spend FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId=? and date=? GROUP BY ads.adId");
            $stmt->bind_param("is", $userId, $date);
        }

        if ($stmt->execute()) {         
            $ad = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $ad; 
        } else {
            return NULL;
        }
    }

    /**
     * Get pop ad by date(details)
     */
    public function getVisualPOPDataForGraph($userId, $date, $topAdduration) {
        if($topAdduration == 3) {
            $stmt = $this->conn->prepare("SELECT SUM(impressions) as impressions, SUM(clicks) as clicks, COUNT(conversion), SUM(money_spent) as spend FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=? and YEAR(date)=year(?) AND MONTH(date)=month(?) GROUP BY ads.adId");
            $stmt->bind_param("iss", $userId, $date, $date);
        } else if ($topAdduration == 4) {
            $stmt = $this->conn->prepare("SELECT SUM(impressions) as impressions, SUM(clicks) as clicks, COUNT(conversion), SUM(money_spent) as spend FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=? and YEAR(date)=? GROUP BY ads.adId");
            $stmt->bind_param("is", $userId, $date);
        } else {
            $stmt = $this->conn->prepare("SELECT SUM(impressions) as impressions, SUM(clicks) as clicks, COUNT(conversion), SUM(money_spent) as spend FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId=? and date=? GROUP BY ads.adId");
            $stmt->bind_param("is", $userId, $date);
        }

        if ($stmt->execute()) {         
            $ad = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $ad; 
        } else {
            return NULL;
        }
    }

    /**
     * Get Native ad impressions for specific user byadId
     */
    public function getNativeadsclicksbyadId($userId, $duration,$customdate, $adId) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and date = CURDATE() and stats_ad_daily.adId=?");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and MONTH(date)=(MONTH(NOW()) - 1) and stats_ad_daily.adId=? ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and date = CURDATE()-1 and stats_ad_daily.adId=? ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) and stats_ad_daily.adId=?");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY)  and stats_ad_daily.adId=?");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and MONTH(date)=MONTH(NOW()) and stats_ad_daily.adId=? ");
        else if($duration == "3")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId =? and YEAR(date)=YEAR(NOW()) and stats_ad_daily.adId=?");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId=? and (date between '$startdate' and '$todate') and stats_ad_daily.adId=? ");
            } else {
                $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId=? and stats_ad_daily.adId=? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='Native' and ads.userId=? and stats_ad_daily.adId=? ");
        }

        $stmt->bind_param("ii", $userId, $adId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get native ad impressions for specific user byadId
     */
    public function getNativeadsimpressionsbyadId($userId, $duration, $customdate, $adId) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and MONTH(date)=MONTH(NOW()) ");
        else if($duration == "3")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and YEAR(date)=YEAR(NOW())");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=?");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=?");
        }

        $stmt->bind_param("ii", $userId, $adId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get POP ad impressions for specific user byadId
     */
    public function getPOPadsclicksbyadId($userId, $duration,$customdate, $adId) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and MONTH(date)=MONTH(NOW()) ");
        else if($duration == "3")
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT count(statsId) as clks_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE clicks=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? ");
        }

        $stmt->bind_param("ii", $userId, $adId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }
    
    /**
     * Get POP ad impressions for specific user byadId
     */
    public function getPOPadsimpressionsbyadId($userId, $duration,$customdate, $adId) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and MONTH(date)=MONTH(NOW()) ");
        else if($duration == "3")
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and YEAR(date)=YEAR(NOW())");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT count(statsId) as imp_ads FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE impressions=1 and ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? ");
        }

        $stmt->bind_param("ii", $userId, $adId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get Native ad Profit for specific user by adId
     */
    public function getNativeadsProfitbyadId($userId, $duration, $customdate, $adId) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and MONTH(date)=MONTH(NOW()) ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='Native' and ads.userId =? and stats_ad_daily.adId=? ");
        }

        $stmt->bind_param("ii", $userId, $adId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }
    /**
     * Get POP ad Profit for specific user by adId
     */
    public function getPOPadsProfitbyadId($userId, $duration, $customdate, $adId) {
        if($duration == "1")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and date = CURDATE() ");
        else if ($duration == "2")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and MONTH(date)=(MONTH(NOW()) - 1) ");
        else if ($duration == "6")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and date = CURDATE()-1 ");
        else if ($duration == "7")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and date >= DATE_SUB(NOW(), INTERVAL 3 DAY) ");
        else if ($duration == "8")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ");
        else if ($duration == "9")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and MONTH(date)=MONTH(NOW()) ");
        else if ($duration == "3")
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and YEAR(date)=YEAR(NOW()) ");
        else if ($duration == "5"){
            if($customdate){
                $customdate = explode(" - ", $customdate);
                $startdate = $todate = "";
                if(isset($customdate[0])){
                    $startdate = $customdate[0];
                    $startdate = date("Y-m-d", strtotime($startdate));
                }
                if(isset($customdate[1])){
                    $todate = $customdate[1];
                    $todate = date("Y-m-d", strtotime($todate));
                }

                $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? and (date between '$startdate' and '$todate') ");
            } else {
                $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? ");
            }
        } else {
            $stmt = $this->conn->prepare("SELECT sum(money_spent) as total_money FROM stats_ad_daily INNER JOIN ads ON stats_ad_daily.adId=ads.adId WHERE ads.adtype='POP' and ads.userId =? and stats_ad_daily.adId=? ");
        }

        $stmt->bind_param("ii", $userId, $adId);
        if ($stmt->execute()) {         
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return NULL;
        }
    }

    /**
     * Get layout of site adcode
     */
    public function getlayoutsite($siteId) {

        $stmt = $this->conn->prepare("SELECT layout FROM adcodes WHERE targetingsite=? ");

        $stmt->bind_param("i", $siteId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user; 
        } else {
            return 1;
        }
    }
}
?>