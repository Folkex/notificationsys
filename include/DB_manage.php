<?php 
class DB_Manage{

    private $conn;

    // constructor
    function __construct() {
        require_once '../../'.DIR_INCLUDE.'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    // destructor
    function __destruct() {
        
    }
	
	/**
     * Storing new publisher site
     * returns site details
     */
    public function insertpubsite($userId,$url) {

        $stmt = $this->conn->prepare("INSERT INTO publisher_sites(siteId,userId,url,status,created_at) VALUES (NULL,?,?,0,NOW())");
		$stmt->bind_param("is",$userId,$url);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM publisher_sites WHERE url = ?");
            $stmt->bind_param("s", $url);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

    /**
     * Delete AdStatus by Id and User's IP
     */
    public function deleteAdStatus($adid, $ip) {
        $stmt = $this->conn->prepare("Delete FROM stats_ad_daily WHERE  adId= ? AND userIP=? ");
        $stmt->bind_param("is", $adid, $ip);
        $result = $stmt->execute();
        $stmt->close();
    }

    /**
     * update Ad status
     */
    public function updateAdStats($adid, $ip, $wp, $action, $adcodeId) {
        if($action == "clicked"){
            $stmt = $this->conn->prepare("UPDATE stats_ad_daily SET clicks=1, conversion=1, impressions=1 WHERE adId=? AND userIP=?");
            $stmt->bind_param("is",$adid, $ip);
            $result = $stmt->execute();
            $stmt->close();
        } else if($action == "added"){
            $impressions = 1;
            $conversion = 0;
            $clicks = 0;

            $stmt = $this->conn->prepare("INSERT INTO stats_ad_daily(statsId, adcodeId, adId, userIP, impressions, clicks, date, time, money_spent, conversion, wp) VALUES (NULL, ?, ?,?,?,?,DATE_FORMAT(NOW(),'%Y-%m-%d'), DATE_FORMAT(NOW(),'%h:%i'), 0, ?, ?) ");
            $stmt->bind_param("iisiiii", $adcodeId, $adid,$ip,$impressions,$clicks,$conversion,$wp);
            $result = $stmt->execute();
            $stmt->close();
        }
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_ad_daily WHERE adId = ? AND userIP=? ");
            $stmt->bind_param("is", $adid, $ip);
            $stmt->execute();
            $ad = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $ad;
        } else {
            return false;
        }
    }

    /**
     * Delete SiteStatus by Id
     */
    public function deleteSiteStatus($adid, $siteid) {
        $stmt = $this->conn->prepare("Delete FROM stats_site_daily WHERE  adId= ? AND siteId=? ");
        $stmt->bind_param("ii", $adid, $siteid);
        $result = $stmt->execute();
        $stmt->close();
    }

    /**
     * update Site status
     */
    public function updateSiteStats($adid, $siteid, $action, $adcodeId) {
        if($action == "clicked"){
            $stmt = $this->conn->prepare("UPDATE stats_site_daily SET clicks=1, conversion=1, impressions=1 WHERE adId=? AND siteId=?");
            $stmt->bind_param("ii",$adid,$siteid);
            $result = $stmt->execute();
            $stmt->close();
        } else if($action == "added"){
            $impressions = 1;
            $conversion = 0;
            $clicks = 0;

            $stmt = $this->conn->prepare("INSERT INTO stats_site_daily(statsId, adcodeId, adId, siteId, impressions, clicks, date, time, money_spent, conversion) VALUES (NULL, ?, ?,?,?,?,DATE_FORMAT(NOW(),'%Y-%m-%d'), DATE_FORMAT(NOW(),'%h:%i'), 0, ?) ");
            $stmt->bind_param("iiiiii", $adcodeId,$adid,$siteid,$impressions,$clicks,$conversion);
            $result = $stmt->execute();
            $stmt->close();
        }
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_site_daily WHERE adId = ? AND siteId=? ");
            $stmt->bind_param("ii", $adid, $siteid);
            $stmt->execute();
            $ad = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $ad;
        } else {
            return false;
        }
    }

    /**
     * Delete BrowserStatus by Id and browser
     */
    public function deleteBrowserStatus($adid, $browserid) {
        $stmt = $this->conn->prepare("Delete FROM stats_browser_daily WHERE  adId= ? AND browserId=? ");
        $stmt->bind_param("ii", $adid, $browserid);
        $result = $stmt->execute();
        $stmt->close();
    }

    /**
     * update Browser status
     */
    public function updateBrowserStats($adid, $browserid, $action, $adcodeId) {
        if($action == "clicked"){
            $stmt = $this->conn->prepare("UPDATE stats_browser_daily SET clicks=1, conversion=1, impressions=1 WHERE adId=? AND browserId=?");
            $stmt->bind_param("ii",$adid,$browserid);
            $result = $stmt->execute();
            $stmt->close();
        } else if($action == "added"){
            $impressions = 1;
            $conversion = 0;
            $clicks = 0;

            $stmt = $this->conn->prepare("INSERT INTO stats_browser_daily(statsId, adcodeId, adId, browserId, impressions, clicks, date, time, money_spent, conversion) VALUES (NULL, ?, ?,?,?,?,DATE_FORMAT(NOW(),'%Y-%m-%d'), DATE_FORMAT(NOW(),'%h:%i'), 0, ?) ");
            $stmt->bind_param("iiiiii", $adcodeId,$adid,$browserid,$impressions,$clicks,$conversion);
            $result = $stmt->execute();
            $stmt->close();
        }

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_browser_daily WHERE adId = ? AND browserId=? ");
            $stmt->bind_param("ii", $adid, $browserid);
            $stmt->execute();
            $browser = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $browser;
        } else {
            return false;
        }
    }

    /**
     * Delete LanguageStatus by Id
     */
    public function deleteLanguageStatus($adid, $languageid) {
        $stmt = $this->conn->prepare("Delete FROM stats_language_daily WHERE  adId= ? AND languageId=? ");
        $stmt->bind_param("ii", $adid, $languageid);
        $result = $stmt->execute();
        $stmt->close();
    }

    /**
     * update Browser status
     */
    public function updateLanguageStats($adid, $languageid, $action, $adcodeId) {
        if($action == "clicked"){
            $stmt = $this->conn->prepare("UPDATE stats_language_daily SET clicks=1, conversion=1, impressions=1 WHERE adId=? AND languageId=?");
            $stmt->bind_param("ii",$adid,$languageid);
            $result = $stmt->execute();
            $stmt->close();

            // check for successful store
        } else if($action == "added"){
            $impressions = 1;
            $conversion = 0;
            $clicks = 0;
            $stmt = $this->conn->prepare("INSERT INTO stats_language_daily(statsId, adcodeId, adId, languageId, impressions, clicks, date, time, money_spent, conversion) VALUES (NULL, ?, ?,?,?,?,DATE_FORMAT(NOW(),'%Y-%m-%d'), DATE_FORMAT(NOW(),'%h:%i'), 0, ?) ");
            $stmt->bind_param("iiiiii", $adcodeId,$adid,$languageid,$impressions,$clicks,$conversion);
            $result = $stmt->execute();
            $stmt->close();
        }

        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_language_daily WHERE adId = ? AND languageId=? ");
            $stmt->bind_param("ii", $adid, $languageid);
            $stmt->execute();
            $lang = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $lang;
        } else {
            return false;
        }
    }

    /**
     * Delete OSStatus by Id
     */
    public function deleteOSStatus($adid, $osid) {
        $stmt = $this->conn->prepare("Delete FROM stats_os_daily WHERE  adId= ? AND osId=? ");
        $stmt->bind_param("ii", $adid, $osid);
        $result = $stmt->execute();
        $stmt->close();
    }

    /**
     * update OS status
     */
    public function updateOSStats($adid, $osid, $action, $adcodeId) {
        if($action == "clicked"){
            $stmt = $this->conn->prepare("UPDATE stats_os_daily SET clicks=1, conversion=1, impressions=1 WHERE adId=? AND osId=?");
            $stmt->bind_param("ii",$adid,$osid);
            $result = $stmt->execute();
            $stmt->close();
        } else if($action == "added"){
            $impressions = 1;
            $conversion = 0;
            $clicks = 0;
            $stmt = $this->conn->prepare("INSERT INTO stats_os_daily(statsId, adcodeId, adId, osId, impressions, clicks, date, time, money_spent, conversion) VALUES (NULL, ?, ?,?,?,?,DATE_FORMAT(NOW(),'%Y-%m-%d'), DATE_FORMAT(NOW(),'%h:%i'), 0, ?) ");
            $stmt->bind_param("iiiiii", $adcodeId,$adid,$osid,$impressions,$clicks,$conversion);
            $result = $stmt->execute();
            $stmt->close();
        }

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_os_daily WHERE adId = ? AND osId=? ");
            $stmt->bind_param("ii", $adid, $osid);
            $stmt->execute();
            $os = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $os;
        } else {
            return false;
        }
    }

	/**
     * Check user is existed or not
     */
    public function isSiteExisted($url) {
        $stmt = $this->conn->prepare("SELECT url from publisher_sites WHERE url LIKE ".$url);
        //$stmt->bind_param("s", $url);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // user existed 
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }

    /**
     * Storing new ad
     * returns ad details
     */
    public function insertnewad($userId, $adtype, $adformat, $devicetype, $name, $clickurl, $bannersize,  $default_clickvalue, $daily_budget, $poptype, $cmprate, $supop, $pop_budget, $cmp_daily, $frequency, $pos32, $pos42, $addescription) {
		$stmt = $this->conn->prepare("INSERT INTO ads(adId,userId,adtype,adformat,devicetype,name,clickurl,bannersize,default_clickvalue,daily_budget,poptype,cmprate,supop,pop_budget,cmp_daily,status,flag_location,flag_category,flag_site,flag_device,flag_os,flag_browser,flag_language,flag_connection,flag_isp,frequency,pos32,pos42,addescription)VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,0,0,0,0,0,0,0,0,0,0,?,?,?,?)");
		$stmt->bind_param("isssssisiiiiiiiiis",$userId, $adtype, $adformat, $devicetype, $name, $clickurl, $bannersize, $default_clickvalue,$daily_budget,$poptype, $cmprate, $supop, $pop_budget, $cmp_daily, $frequency, $pos32, $pos42, $addescription);
 
        $result = $stmt->execute();
        $stmt->close();
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM ads WHERE clickurl = ?");
            $stmt->bind_param("s", $clickurl);
            $stmt->execute();
            $ad = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $ad;
        } else {
            return false;
        }
    }

    /**
     * Update ad by adId
     */
    public function UpdateAd($adId, $userid, $name, $clickurl, $bannersize, $default_clickvalue, $daily_budget,$poptype,$cmprate,$supop,$pop_budget,$cmp_daily,$frequency,$pos32,$pos42,$addescription) {
        $stmt = $this->conn->prepare("UPDATE ads SET userid=?,name=?,clickurl=?,bannersize=?,default_clickvalue=?,daily_budget=?,poptype=?,cmprate=?,supop=?,pop_budget=?,cmp_daily=?,frequency=?,pos32=?,pos42=?,addescription=? WHERE adId=?");
        $stmt->bind_param("issiiisiiiiiiisi",$userid, $name, $clickurl, $bannersize, $default_clickvalue, $daily_budget, $poptype, $cmprate, $supop, $pop_budget, $cmp_daily,$frequency,$pos32,$pos42,$addescription, $adId);
        $result = $stmt->execute();
        $stmt->close();
		// check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM ads WHERE userId = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Update user by userId
     */
    public function updatePPbyUserId($userId, $newPP) {
        $stmt = $this->conn->prepare("UPDATE users SET paypal_email=? WHERE userId=?");
        $stmt->bind_param("si",$newPP, $userId);
        $result = $stmt->execute();
        $stmt->close();
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE userId = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

    /**
     *  Transfer to Advertiser
     */
    public function TransfertoAdvertiser($publisherId, $advPPEmail, $amount) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE paypal_email=? AND account_type='Advertiser'");
        $stmt->bind_param("s", $advPPEmail);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ($user) {
            $stmt = $this->conn->prepare("UPDATE users SET adv_balance=? WHERE paypal_email=? AND account_type='Advertiser' ");
            $stmt->bind_param("is",$amount, $advPPEmail);
            $result = $stmt->execute();
            $stmt->close();
            // check for successful store

            $advId = $user['userId'];
            $trans = "Transfer";
            $currency = "USD";
            $status = "SUCCESS";

            $stmt = $this->conn->prepare("INSERT INTO publisher_payments(payment_id,pubId,advId,payment_mode,payment_amount,payment_currency,payment_status,payout_date) VALUES (NULL,?,?,?,?,?,?,NOW())");
            $stmt->bind_param("iisiss",$publisherId,$advId,$trans,$amount,$currency,$status);

            $result = $stmt->execute();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

    /**
     * Update ad by adId
     */
    public function UpdateAdByFieldName($adId,$fieldname) {
        $preStr = "UPDATE ads SET ".$fieldname."=1 WHERE adId=?";
        $stmt = $this->conn->prepare($preStr);
        $stmt->bind_param("i",$adId);
        $result = $stmt->execute();

    }


    /**
     * Update ad by adId
     */
    public function updateTargetingSites($adId, $userId, $value, $catid) {
        $stm = $this->conn->prepare("SELECT targetingId, siteId from targeting_sites WHERE adId=? AND userId=? AND categoryid=?");
        $stm->bind_param("iii", $adId, $userId, $catid);
        $stm->execute();

        $olddetails = $stm->get_result()->fetch_assoc();
        if (isset($olddetails["targetingId"])) {
            $stm->close();
            $preStr = "UPDATE targeting_sites SET siteId=? WHERE adId=? AND userId=? AND categoryid=?";
            $stmt = $this->conn->prepare($preStr);
            $newids = $olddetails["siteId"].$value;
            $stmt->bind_param("siii", $value, $adId, $userId, $catid);
            $result = $stmt->execute();
            $stmt->close();
        } else {
            $stm->close();
            $stmt = $this->conn->prepare("INSERT INTO targeting_sites(targetingId,adId,userId,siteId,type,categoryid) VALUES (NULL,?,?,?,?,?)");
            $stmt->bind_param("iisi",$adId,$userId,$value,"2", $catid);

            $result = $stmt->execute();
            $stmt->close();
        }
    }

    public function updateTSiteDetails($adId, $userId, $siteids, $type, $catid) {
        $stm = $this->conn->prepare("SELECT targetingId, siteId from targeting_sites WHERE adId=? AND userId=? AND categoryid=?");
        $stm->bind_param("iii", $adId, $userId, $catid);
        $stm->execute();

        $olddetails = $stm->get_result()->fetch_assoc();
        if (isset($olddetails["targetingId"])) {
            $stm->close();
            $preStr = "UPDATE targeting_sites SET siteId=?, type=? WHERE adId=? AND userId=? AND categoryid=?";

            $stmt = $this->conn->prepare($preStr);
            $newids = $olddetails["siteId"].$siteids;
            $stmt->bind_param("siiii", $newids, $type, $adId, $userId, $catid);
            $result = $stmt->execute();
            $stmt->close();
        } else {
            $stm->close();
            $stmt = $this->conn->prepare("INSERT INTO targeting_sites(targetingId,adId,userId,siteId,type,categoryid) VALUES (NULL,?,?,?,?,?)");
            $stmt->bind_param("iisii",$adId,$userId,$siteids,$type,$catid);

            $result = $stmt->execute();
            $stmt->close();
        }
    }

    /**
     * Delete IspStatus by Id
     */
    public function deletetargetingIsps($adid, $userid) {
        $stmt = $this->conn->prepare("Delete FROM targeting_isp WHERE  adId= ? AND userId=? ");
        $stmt->bind_param("ii", $adid, $userid);
        $result = $stmt->execute();
        $stmt->close();
    }

    /**
     * Storing new targeting isp
     * returns targeting isp details
    */
    public function targetIsp($adId,$userId,$country_code,$ispId) { 
        $stmt = $this->conn->prepare("INSERT INTO targeting_isp(targetingId,userId,adId,country_code,ispId) VALUES (NULL,?,?,?,?)");
        $stmt->bind_param("iisi",$userId,$adId,$country_code,$ispId);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM targeting_location WHERE adId = ? AND userId=? AND country_code=? ");
            $stmt->bind_param("iis", $adId, $userId, $country_code);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

    /**
     * Check ad is existed or not
     */
    public function isAdExisted($url) {
        $stmt = $this->conn->prepare("SELECT clickurl from ads WHERE clickurl = ?");

        $stmt->bind_param("s", $url);

        $stmt->execute();

        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // user existed 
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }


	/**
     * Get sites by siteId
     */
    public function getsitesbysiteId($siteId) {
        $stmt = $this->conn->prepare("SELECT * FROM publisher_sites where siteId=?");
		$stmt->bind_param("i", $siteId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * Update site by siteId
     */
    public function Updatepubsite($siteId,$url) {
        $stmt = $this->conn->prepare("UPDATE publisher_sites SET url=?,status=0,created_at=NOW() WHERE siteId=?");
        $stmt->bind_param("si",$url,$siteId);
		$result = $stmt->execute();
        $stmt->close();
	}
	
	/**
     * Delete site by siteId
     */
    public function deletesite($siteId) {
        $stmt = $this->conn->prepare("Delete FROM publisher_sites WHERE  siteId= ?");
        $stmt->bind_param("i", $siteId);
		$result = $stmt->execute();
        $stmt->close();
    }
	
	/**
     * Storing new publisher site adcode
     * returns adcode details
     */
    public function insertpubsiteadcode($userId,$name,$adcode_type,$language,$targetingsite,$adtype,$layout,$adimg_dimension,$css_java,$pop_type) {
        $stmt = $this->conn->prepare("INSERT INTO adcodes(adcodeId,userId,name,adcode_type,language,targetingsite,adtype,layout,adimg_dimension,css_java,border,pop_type,ad_title_color,ad_description_color,ad_background_color,ad_credittext_color,ad_headertext_color,ad_headerbackground_color) VALUES (NULL,?,?,?,?,?,?,?,?,?,NULL,?,NULL,NULL,NULL,NULL,NULL,NULL)");
		$stmt->bind_param("isssisiisi",$userId,$name,$adcode_type,$language,$targetingsite,$adtype,$layout,$adimg_dimension,$css_java,$pop_type);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM adcodes WHERE targetingsite = ?");
            $stmt->bind_param("s", $targetingsite);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

	/**
     * Update adcode by adcodeId
     */
    public function Updatepubsiteadcode($adcodeId,$name,$language,$targetingsite,$adtype,$layout,$adimg_dimension,$css_java,$border,$pop_type,$ad_title_color,$ad_description_color,$ad_background_color,$ad_credittext_color,$ad_headertext_color,$ad_headerbackground_color) {
        $stmt = $this->conn->prepare("UPDATE adcodes SET name=?,language=?,targetingsite=?,adtype=?,layout=?,adimg_dimension=?,css_java=?,border=?,pop_type=?,ad_title_color=?,ad_description_color=?,ad_background_color=?,ad_credittext_color=?,ad_headertext_color=?,ad_headerbackground_color=? WHERE adcodeId=?");
        $stmt->bind_param("sssssssiissssssi",$name,$language,$targetingsite,$adtype,$layout,$adimg_dimension,$css_java,$border,$pop_type,$ad_title_color,$ad_description_color,$ad_background_color,$ad_credittext_color,$ad_headertext_color,$ad_headerbackground_color,$adcodeId);
		$result = $stmt->execute();
        $stmt->close();
	}
	
	/**
     * Delete site by siteId
     */
    public function deleteadcodesite($adcodeId) {
        $stmt = $this->conn->prepare("Delete FROM adcodes WHERE adcodeId= ?");
        $stmt->bind_param("i", $adcodeId);
		$result = $stmt->execute();
        $stmt->close();
    }
	
	/**
     * Check targeting site if have adcode or not
     */
    public function istargetingSiteExisted($targetingsite) {
        $stmt = $this->conn->prepare("SELECT targetingsite from adcodes WHERE targetingsite = ?");

        $stmt->bind_param("i", $targetingsite);

        $stmt->execute();

        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // user existed 
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }
	
	/**
     * Storing new restricted site 
     * returns site details
     */
    public function insertrestrictedsites($userId,$site) { 
        $stmt = $this->conn->prepare("INSERT INTO restricted_sites(restrictedId,userId,site) VALUES (NULL,?,?)");
		$stmt->bind_param("is",$userId,$site);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM restricted_sites WHERE site = ?");
            $stmt->bind_param("s", $site);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
	/**
     * Check restricted site if already exist
     */
    public function isRestrictedSiteExisted($site) {
        $stmt = $this->conn->prepare("SELECT site from restricted_sites WHERE site = ?");

        $stmt->bind_param("s", $site);

        $stmt->execute();

        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // user existed 
			$stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }
	
	/**
     * Update site by siteId
     */
    public function Updaterestrictedsites($restrictedId,$site) {
        $stmt = $this->conn->prepare("UPDATE restricted_sites SET site=? WHERE restrictedId=?");
        $stmt->bind_param("si",$site,$restrictedId);
		$result = $stmt->execute();
        $stmt->close();
	}
	
	/**
     * Delete site by siteId
     */
    public function deleterestrictedesite($restrictedId) {
        $stmt = $this->conn->prepare("Delete FROM restricted_sites WHERE restrictedId= ?");
        $stmt->bind_param("i", $restrictedId);
		$result = $stmt->execute();
        $stmt->close();
    }
    /**
     * Delete ad by adId
     */
    public function deleteAd($adId) {
        $stmt = $this->conn->prepare("Delete FROM ads WHERE adId= ?");
        $stmt->bind_param("i", $adId);
        $result = $stmt->execute();
        $stmt->close();
    }

	/**
     * Count categories 
     */
    public function getcategorycount() { 
        $stmt = $this->conn->prepare("SELECT COUNT(categoryId) AS cat_count FROM categories WHERE parentId=0 ");
		if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * Count sub categories 
     */
    public function getsubcategorycount() { 
        $stmt = $this->conn->prepare("SELECT COUNT(categoryId) AS scat_count FROM categories WHERE parentId!=0 ");
		if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }

	/**
     * Storing new site categories
     */
    public function insertsitecategories($userId,$site,$categories) { 
        $stmt = $this->conn->prepare("INSERT INTO publisher_sites_categories(userId,siteId,categoryId) VALUES (?,?,?)");
		$stmt->bind_param("iii",$userId,$site,$categories);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
	/**
     * Delete site categories by siteId
     */
    public function deletesitecategories($siteId) {
        $stmt = $this->conn->prepare("DELETE FROM publisher_sites_categories WHERE siteId=?");
        $stmt->bind_param("i", $siteId);
		$result = $stmt->execute();
        $stmt->close();
    }
	
	/**
     * Delete site adcodes by siteId
     */
    public function deletesiteadcodes($siteId) {
        $stmt = $this->conn->prepare("DELETE FROM adcodes WHERE targetingsite= ?");
        $stmt->bind_param("i", $siteId);
		$result = $stmt->execute();
        $stmt->close();
    }

	/**
     * Delete target location for adId
    */
    public function deletetargetinglocations($adId) {
		$stmt = $this->conn->prepare("DELETE FROM targeting_location WHERE adId = ?");
        $stmt->bind_param("i", $adId);
        $stmt->execute();
        $stmt->close();	
    }

	/**
     * Storing new targeting location  
     * returns targeting location details
    */
    public function targetlocation($adId,$userId,$loc) { 
		
        $stmt = $this->conn->prepare("INSERT INTO targeting_location(targetingId,userId,adId,country_code) VALUES (NULL,?,?,?)");
		$stmt->bind_param("iis",$userId,$adId,$loc);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM targeting_location WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

    /**
     * Delete target site for adId
    */
    public function deletetargetingsites($adId, $userId) {
        $stmt = $this->conn->prepare("DELETE FROM targeting_sites WHERE adId = ? AND userId=? ");
        $stmt->bind_param("ii", $adId, $userId);
        $stmt->execute();
        $stmt->close(); 
    }

    /**
     * Delete specific target site 
    */
    public function deleteTargetingSiteByDetails($adid, $userid, $siteid, $catid) {
        $stmt = $this->conn->prepare("DELETE FROM targeting_sites WHERE adId = ? AND userId=? AND siteId=? AND categoryid=? ");
        $stmt->bind_param("iiii", $adid, $userid, $siteid, $catid);
        $stmt->execute();
        $stmt->close(); 
    }

    /**
     * Storing new targeting site
     * returns targeting site details
    */
    public function targetsite($adId, $userId, $siteId, $category, $type) { 
        $stmt = $this->conn->prepare("INSERT INTO targeting_sites(targetingId,userId,adId,siteId,categoryid,type) VALUES (NULL,?,?,?,?,?)");
        $stmt->bind_param("iiiii",$userId, $adId, $siteId, $category, $type);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM targeting_sites WHERE siteId = ?");
            $stmt->bind_param("i", $siteId);
            $stmt->execute();
            $site = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $site;
        } else {
            return false;
        }
    }

	/**
     * Delete target categories for adId
    */
    public function deletetargetingcategories($adId) {
		$stmt = $this->conn->prepare("DELETE FROM targeting_category WHERE adId = ?");
        $stmt->bind_param("i", $adId);
        $stmt->execute();
        $stmt->close();	
    }
	
	/**
     * Storing new targeting categories  
     * returns targeting categories details
     */
    public function targetcategories($adId,$userId,$category,$click_value) { 
        $stmt = $this->conn->prepare("INSERT INTO targeting_category(targetingId,userId,adId,categoryId,clickvalue) VALUES (NULL,?,?,?,?)");
		$stmt->bind_param("iiii",$userId,$adId,$category,$click_value);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM targeting_category WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
	/**
     * Delete target categories for adId
    */
    public function deletetargetingdevices($adId) {
		$stmt = $this->conn->prepare("DELETE FROM targeting_device WHERE adId = ?");
        $stmt->bind_param("i", $adId);
        $stmt->execute();
        $stmt->close();	
    }
	
	/**
     * Storing new targeting devices  
     * returns targeting devices details
     */
    public function targetdevices($adId,$userId,$device,$device_type) { 
        $stmt = $this->conn->prepare("INSERT INTO targeting_device(targetingId,userId,adId,devicetype,devicesubtype) VALUES (NULL,?,?,?,?)");
		$stmt->bind_param("iiis",$userId,$adId,$device,$device_type);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM targeting_device WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
    /**
     * Get OS count
     */
    public function getOScount() {
        $stmt = $this->conn->prepare("SELECT count(id) as Count_os FROM os");
        if ($stmt->execute()) {
            $os = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $os;
            }else{
               return NULL;
        }
    }
	
	/**
     * Storing new targeting os  
     * returns targeting os details
     */
    public function targetos($adId,$userId,$os) { 
        $stmt = $this->conn->prepare("INSERT INTO targeting_os(targetingId,userId,adId,os) VALUES (NULL,?,?,?)");
		$stmt->bind_param("iii",$userId,$adId,$os);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM targeting_os WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
	/**
     * Delete target os for adId
    */
    public function deletetargetingos($adId) {
		$stmt = $this->conn->prepare("DELETE FROM targeting_os WHERE adId = ?");
        $stmt->bind_param("i", $adId);
        $stmt->execute();
        $stmt->close();	
    }

	/**
     * Storing new targeting browsers  
     * returns targeting browsers details
     */
    public function targetbrowsers($adId,$userId,$browser) { 
        $stmt = $this->conn->prepare("INSERT INTO targeting_browsers(targetingId,userId,adId,browserId) VALUES (NULL,?,?,?)");
		$stmt->bind_param("iii",$userId,$adId,$browser);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM targeting_browsers WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
	/**
     * Delete target browsers for adId
    */
    public function deletetargetingbrowsers($adId) {
		$stmt = $this->conn->prepare("DELETE FROM targeting_browsers WHERE adId = ?");
        $stmt->bind_param("i", $adId);
        $stmt->execute();
        $stmt->close();	
    }
	
    /**
     * Get browsers count
     */
    public function getbrowserscount() {
        $stmt = $this->conn->prepare("SELECT count(browserId) as Count_browsers FROM browsers");
        if ($stmt->execute()) {
            $os = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $os;
            }else{
               return NULL;
        }
    }

	/**
     * Storing new targeting connections  
     * returns targeting connections details
     */
    public function targetconnections($adId,$userId,$connection) { 
        $stmt = $this->conn->prepare("INSERT INTO targeting_connection(targetingId,userId,adId,connectionId) VALUES (NULL,?,?,?)");
		$stmt->bind_param("iii",$userId,$adId,$connection);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM targeting_connection WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
	/**
     * Delete target connections for adId
    */
    public function deletetargetingconnections($adId) {
		$stmt = $this->conn->prepare("DELETE FROM targeting_connection WHERE adId = ?");
        $stmt->bind_param("i", $adId);
        $stmt->execute();
        $stmt->close();	
    }	
	/**
     * Get connection count
     */
    public function getconnectionscount() {
        $stmt = $this->conn->prepare("SELECT count(connectionId) as Count_connections FROM connections");
        if ($stmt->execute()) {
            $os = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $os;
            }else{
               return NULL;
        }
    }
	
	/**
     * Delete target language for adId
    */
    public function deletetargetinglanguages($adId) {
		$stmt = $this->conn->prepare("DELETE FROM targeting_language WHERE adId = ?");
        $stmt->bind_param("i", $adId);
        $stmt->execute();
        $stmt->close();	
    }	
	
	/**
     * Get language count
     */
    public function getlanguagescount() {
        $stmt = $this->conn->prepare("SELECT count(id) as Count_languages FROM language");
        if ($stmt->execute()) {
            $os = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $os;
            }else{
               return NULL;
        }
    }
	
	/**
     * Storing new targeting languages  
     * returns targeting languages details
     */
    public function targetlanguages($adId,$userId,$languages) { 
        $stmt = $this->conn->prepare("INSERT INTO targeting_language(targetingId,userId,adId,language) VALUES (NULL,?,?,?)");
		$stmt->bind_param("iii",$userId,$adId,$languages);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM targeting_language WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
	/**
     * Storing new daily stats 
     * returns daily stats details
     */
    public function insertdailystats($adcodeId,$adId,$userIP,$money_spent) { 
        $stmt = $this->conn->prepare("INSERT INTO stats_ad_daily(statsId,adcodeId,adId,userIP,impressions,clicks,date,time,money_spent,conversion) VALUES (NULL,?,?,?,1,0,NOW(),NOW(),?,0)");
		$stmt->bind_param("iisi",$adcodeId,$adId,$userIP,$money_spent);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_ad_daily WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
	/**
     * Update daily stats by adId
     */
    public function updatedailystats($adcodeId,$adId,$userIP,$money_spent) {
        $stmt = $this->conn->prepare("UPDATE stats_ad_daily SET clicks=1,date=NOW(),time=NOW(),money_spent=? WHERE adcodeId=? and adId=? and userIP=?");
        $stmt->bind_param("iiis",$money_spent,$adcodeId,$adId,$userIP);
		$result = $stmt->execute();
        $stmt->close();
	}
	
	/**
     * Storing new daily stats language
     * returns daily stats language details
     */
    public function insertdailystatslanguage($adcodeId,$adId,$money_spent,$lang) { 
        $stmt = $this->conn->prepare("INSERT INTO stats_language_daily(statsId,adcodeId,adId,impressions,clicks,date,time,money_spent,conversion,languageId) VALUES (NULL,?,?,1,0,NOW(),NOW(),?,0,?)");
		$stmt->bind_param("iisi",$adcodeId,$adId,$money_spent,$lang);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_language_daily WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
	/**
     * Get languageId by code
     */
    public function getlanguageId($langcode) {
        $stmt = $this->conn->prepare("SELECT id FROM language WHERE code=?");
		$stmt->bind_param("i", $langcode);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * Update daily language stats by adId
     */
    public function updatedailystatslanguage($adcodeId,$adId,$languageId,$money_spent) {
        $stmt = $this->conn->prepare("UPDATE stats_language_daily SET clicks=1,date=NOW(),time=NOW(),money_spent=? WHERE adcodeId=? and adId=? and languageId=?");
        $stmt->bind_param("iiii",$money_spent,$adcodeId,$adId,$languageId);
		$result = $stmt->execute();
        $stmt->close();
	}
	
	/**
     * Storing new daily stats browser
     * returns daily stats browser details
     */
    public function insertdailystatsbrowser($adcodeId,$adId,$money_spent,$browser) { 
        $stmt = $this->conn->prepare("INSERT INTO stats_browser_daily(statsId,adcodeId,adId,impressions,clicks,date,time,money_spent,conversion,browserId) VALUES (NULL,?,?,1,0,NOW(),NOW(),?,0,?)");
		$stmt->bind_param("iiii",$adcodeId,$adId,$money_spent,$browser);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_browser_daily WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
	/**
     * Get browserId by name
     */
    public function getbrowserId($browser) {
        $stmt = $this->conn->prepare("SELECT browserId FROM browsers WHERE name=?");
		$stmt->bind_param("s", $browser);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * Update daily browser stats by adId
     */
    public function updatedailystatsbrowser($adcodeId,$adId,$browserId,$money_spent) {
        $stmt = $this->conn->prepare("UPDATE stats_browser_daily SET clicks=1,date=NOW(),time=NOW(),money_spent=? WHERE adcodeId=? and adId=? and browserId=?");
        $stmt->bind_param("iiii",$money_spent,$adcodeId,$adId,$browserId);
		$result = $stmt->execute();
        $stmt->close();
	}
	
	/**
     * Storing new daily stats os
     * returns daily stats os details
     */
    public function insertdailystatsos($adcodeId,$adId,$money_spent,$os) { 
        $stmt = $this->conn->prepare("INSERT INTO stats_os_daily(statsId,adcodeId,adId,impressions,clicks,date,time,money_spent,conversion,osId) VALUES (NULL,?,?,1,0,NOW(),NOW(),?,0,?)");
		$stmt->bind_param("iiii",$adcodeId,$adId,$money_spent,$os);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_os_daily WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
	/**
     * Get browserId by name
     */
    public function getosId($os) {
        $stmt = $this->conn->prepare("SELECT id FROM os WHERE name=?");
		$stmt->bind_param("s", $os);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * Update daily browser stats by adId
     */
    public function updatedailystatsos($adcodeId,$adId,$osId,$money_spent) {
        $stmt = $this->conn->prepare("UPDATE stats_os_daily SET clicks=1,date=NOW(),time=NOW(),money_spent=? WHERE adcodeId=? and adId=? and osId=?");
        $stmt->bind_param("iiii",$money_spent,$adcodeId,$adId,$osId);
		$result = $stmt->execute();
        $stmt->close();
	}
	
	/**
     * Storing new daily stats site
     * returns daily site os details
     */
    public function insertdailystatssite($adcodeId,$adId,$money_spent,$siteId) { 
        $stmt = $this->conn->prepare("INSERT INTO stats_site_daily(statsId,adcodeId,adId,impressions,clicks,date,time,money_spent,conversion,siteId) VALUES (NULL,?,?,1,0,NOW(),NOW(),?,0,?)");
		$stmt->bind_param("iiii",$adcodeId,$adId,$money_spent,$siteId);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_site_daily WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
	/**
     * Update daily site stats by adId
     */
    public function updatedailystatssite($adcodeId,$adId,$siteId,$money_spent) {
        $stmt = $this->conn->prepare("UPDATE stats_site_daily SET clicks=1,date=NOW(),time=NOW(),money_spent=? WHERE adcodeId=? and adId=? and siteId=?");
        $stmt->bind_param("iiii",$money_spent,$adcodeId,$adId,$siteId);
		$result = $stmt->execute();
        $stmt->close();
	}
	
	/**
     * Get all site categories
     */
    public function getsitecategoriesbyid($siteId) {
        $stmt = $this->conn->prepare("SELECT userId,siteId,categories.categoryId,name FROM publisher_sites_categories INNER JOIN categories ON publisher_sites_categories.categoryId=categories.categoryId WHERE siteId=?");
		$stmt->bind_param("i", $siteId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * Storing new daily stats category
     * returns daily category details
     */
    public function insertdailystatscategory($adcodeId,$adId,$money_spent,$categoryId) { 
        $stmt = $this->conn->prepare("INSERT INTO stats_category_daily(statsId,adcodeId,adId,impressions,clicks,date,time,money_spent,conversion,categoryId) VALUES (NULL,?,?,1,0,NOW(),NOW(),?,0,?)");
		$stmt->bind_param("iiii",$adcodeId,$adId,$money_spent,$categoryId);
		$result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM stats_category_daily WHERE adId = ?");
            $stmt->bind_param("i", $adId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }
	
	/**
     * Update daily site categories stats by adId
     */
    public function updatedailystatscategory($adcodeId,$adId,$categoryId,$money_spent) {
        $stmt = $this->conn->prepare("UPDATE stats_category_daily SET clicks=1,date=NOW(),time=NOW(),money_spent=? WHERE adcodeId=? and adId=? and categoryId=?");
        $stmt->bind_param("iiii",$money_spent,$adcodeId,$adId,$categoryId);
		$result = $stmt->execute();
        $stmt->close();
	}

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Update password for specific user
     */
    public function updatePasswd($userId, $password) {
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt

        $stmt = $this->conn->prepare("UPDATE users SET encrypted_password=?, salt=? WHERE userId=?");
        $stmt->bind_param("ssi",$encrypted_password, $salt, $userId);
        $result = $stmt->execute();
        $stmt->close();

        // updated successfully
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE userId = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }

    }

    /**
     * Update user's profile
     */
    public function updateProfile($fname, $lname, $address, $phone, $email, $domain, $countryname, $userId) {
        $stmt = $this->conn->prepare("UPDATE users SET fname=?, lname=?, address=?, phone=?, email=?, domain=?, country=? WHERE userId=?");
        $stmt->bind_param("sssssssi",$fname, $lname, $address, $phone, $email, $domain, $countryname, $userId);
        $result = $stmt->execute();
        $stmt->close();

        // updated successfully
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE userId = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
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
     * Storing image for ad
     */
    public function insertimgforad($imagename, $imagetitle, $adId) {
        $stmt = $this->conn->prepare("INSERT INTO adimages(imageId, adId, imagename, imagetitle) VALUES (NULL,?,?,?)");
        $stmt->bind_param("iss", $adId, $imagename, $imagetitle);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete Images for selected Ad
     */
    public function removeallImageforAd($adid) {

        $stmt = $this->conn->prepare("SELECT imagename FROM adimages where adId=?");
        $stmt->bind_param("i", $adid);
        if ($stmt->execute()) {
            $images = $stmt->get_result()->fetch_all();
            $stmt->close();
            foreach ($images as $value) {
                # code...
                unlink("../../ad_banner/".$value[0]);
            }
        }

        $stmt = $this->conn->prepare("Delete FROM adimages WHERE  adId= ? ");
        $stmt->bind_param("i", $adid);
        $result = $stmt->execute();
        $stmt->close();

        if($result)
            return true;
        else 
            return false;
    }

    /**
     * Delete Image for selected Ad
     */
    public function deleteAdImg($adId, $imagename) {
        $stmt = $this->conn->prepare("Delete FROM adimages WHERE adId=? AND imagename=? ");
        $stmt->bind_param("is", $adId, $imagename);
        $result = $stmt->execute();
        $stmt->close();
        if($result)
            return true;
        else 
            return false;
    }

    /**
     * Updating image for ad
     */
    public function updateimgforad($imagename, $imagetitle, $adId) {
        $stmt = $this->conn->prepare("UPDATE adimages SET imagetitle=? WHERE adId=? AND imagename=?");
        $stmt->bind_param("sis",$imagetitle, $adId, $imagename);
        $result = $stmt->execute();
        $stmt->close();
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM adimages WHERE adId=? AND imagename=?");
            $stmt->bind_param("is", $adId, $imagename);
            $stmt->execute();
            $adimage = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $adimage;
        } else {
            return false;
        }
    }

    /**
     * Add user to blacklist
    */
    public function insertbannedUser($ipaddress, $countryName, $browser, $os) { 
        $stmt = $this->conn->prepare("INSERT INTO blacklist(id,bannedip,countryName,browserName,osName,accessdate) VALUES (NULL,?,?,?,?,NOW())");
        $stmt->bind_param("ssss",$ipaddress,$countryName,$browser,$os);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM blacklist WHERE bannedip = ? ");
            $stmt->bind_param("s", $ipaddress);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return false;
        }
    }

    /**
     * Update banned user's info
     */
    public function updatebannedUser($ipaddress, $countryName, $browser, $os) {
        $stmt = $this->conn->prepare("UPDATE blacklist SET countryName=?, browserName=?, osName=?, accessdate=NOW() WHERE bannedip=?");
        $stmt->bind_param("ssss",$countryName, $browser, $os, $ipaddress);
        $result = $stmt->execute();
        $stmt->close();
        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM blacklist WHERE bannedip = ?");
            $stmt->bind_param("s", $ipaddress);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

}
?>