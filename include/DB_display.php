<?php
class DB_Display{

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
     * Get categories
     */
    public function getcategories() {
        $stmt = $this->conn->prepare("SELECT * FROM categories where parentId=0 ORDER BY name");
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $user;
        }else{
            return NULL;
        }
    }

    /**
     * Get activated sites for publisher
     */
    public function getuseractivesites($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM publisher_sites WHERE userId=? AND status=1 ");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $user;
        }else{
            return NULL;
        }
    }

    /**
     * Get all categories
     */
    public function getallcategories() {
        $stmt = $this->conn->prepare("SELECT * FROM categories");
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $user;
        }else{
            return NULL;
        }
    }

    /**
     * Get all banner
     */
    public function getbanners() {
        $stmt = $this->conn->prepare("SELECT * FROM banners");
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $user;
        }else{
            return NULL;
        }
    }

	 /**
     * Get subcategoies by categoryId
     */
    public function getsubcategoies($categoryId) {
        $stmt = $this->conn->prepare("SELECT * FROM categories where parentId=? ORDER BY name");
		$stmt->bind_param("i", $categoryId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * Get sites by userId
     */
    public function getusersites($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM publisher_sites where userId=?");
		$stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }

    /**
     * Get Targetsite by userid and adid
     */
    public function getTargetsitebyid($userid, $adid, $catid) {
        $stmt = $this->conn->prepare("SELECT * FROM targeting_sites where userId=? AND adId=? AND categoryid=?");
        $stmt->bind_param("iii", $userid, $adid, $catid);
        if ($stmt->execute()) {
            $site = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $site;
            }else{
                return NULL;
        }
    }

    /**
     * Get isps by country
     */
    public function getIspsByCountry($country) {
        $stmt = $this->conn->prepare("SELECT * FROM isp where LOWER(country)=?");
        $stmt->bind_param("s", $country);
        if ($stmt->execute()) {
            $isp = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $isp;
            }else{
                return NULL;
        }
    }

    /**
     * Get isps by id
     */
    public function getIspnameById($ispId) {
        $stmt = $this->conn->prepare("SELECT name FROM isp where id=?");
        $stmt->bind_param("i", $ispId);
        if ($stmt->execute()) {
            $isp = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $isp;
            }else{
                return NULL;
        }
    }

    /**
     * Get Targetisp by userid and adid and categoryid
     */
    public function getTargetispById($userid, $adid, $country) {
        $stmt = $this->conn->prepare("SELECT * FROM targeting_isp where userId=? AND adId=? AND country_code=?");
        $stmt->bind_param("iis", $userid, $adid, $country);
        if ($stmt->execute()) {
            $site = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $site;
            }else{
                return NULL;
        }
    }

    /**
     * Get site by userid and categoryid
     */
    public function getSitebyid($categoryid) {
        $stmt = $this->conn->prepare("SELECT * FROM publisher_sites_categories where categoryId=?");
        $stmt->bind_param("i", $categoryid);

        if ($stmt->execute()) {
            $site = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $site;
            }else{
                return NULL;
        }
    }

    /**
     * Get history of advertiser's payment history by advId
     */
    public function advertiserPaymentHistories($advId, $payment_status) {
        if($payment_status == "All"){
            $stmt = $this->conn->prepare("SELECT * FROM advertiser_payments where advId=? ");
            $stmt->bind_param("i", $advId);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM advertiser_payments where advId=? AND payment_status=? ");
            $stmt->bind_param("is", $advId, $payment_status);
        }

        if ($stmt->execute()) {
            $history = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $history;
            }else{
                return NULL;
        }
    }

    /**
     * Get history of transfer from publisher
     */
    public function transferFromPublisherHistories($advId, $payment_status) {
        if($payment_status == "All"){
            $stmt = $this->conn->prepare("SELECT * FROM publisher_payments where advId=? ");
            $stmt->bind_param("i", $advId);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM publisher_payments where advId=? AND payment_status=? ");
            $stmt->bind_param("is", $advId, $payment_status);
        }

        if ($stmt->execute()) {
            $history = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $history;
            }else{
                return NULL;
        }
    }

    /**
     * Get history of publisher's payment history by pubId
     */
    public function publisherPaymentHistories($pubId, $payment_mode, $payment_status) {

        if($payment_mode == "All" && $payment_status == "All"){
            $stmt = $this->conn->prepare("SELECT * FROM publisher_payments where pubId=? ");
            $stmt->bind_param("i", $pubId);
        } else if ($payment_mode == "All"){
            $stmt = $this->conn->prepare("SELECT * FROM publisher_payments where pubId=? AND payment_status=? ");
            $stmt->bind_param("is", $pubId, $payment_status);
        } else if ($payment_status == "All"){
            $stmt = $this->conn->prepare("SELECT * FROM publisher_payments where pubId=? AND payment_mode=?");
            $stmt->bind_param("is", $pubId, $payment_mode);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM publisher_payments where pubId=? AND payment_mode=? AND payment_status=? ");
            $stmt->bind_param("iss", $pubId, $payment_mode, $payment_status);
        }

        if ($stmt->execute()) {
            $history = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $history;
            }else{
                return NULL;
        }
    }

    /**
     * Get history of publisher's payment history by paymentId
     */
    public function publisherPaymentHistoy($paymentId) {
        $stmt = $this->conn->prepare("SELECT * FROM publisher_payments where payment_id=? ");
        $stmt->bind_param("i", $paymentId);
        if ($stmt->execute()) {
            $history = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $history;
            }else{
                return NULL;
        }
    }

    /**
     * Get history of advertiser's payment history by paymentId
     */
    public function advertiserPaymentHistoy($paymentId) {
        $stmt = $this->conn->prepare("SELECT * FROM advertiser_payments where payment_id=? ");
        $stmt->bind_param("i", $paymentId);
        if ($stmt->execute()) {
            $history = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $history;
            }else{
                return NULL;
        }
    }

	/**
     * Get sites by category and status
     */
    public function getusersitessrc($categoryId,$status) {
		if($categoryId==""){
			$stmt = $this->conn->prepare("SELECT * FROM publisher_sites where status=?");
			$stmt->bind_param("i", $status);
		} 
		else{
			$stmt = $this->conn->prepare("SELECT publisher_sites.siteId,publisher_sites.userId,url,status,title,categoryId FROM publisher_sites INNER JOIN publisher_sites_categories ON publisher_sites.siteId=publisher_sites_categories.siteId where categoryId=? and status=?");
			$stmt->bind_param("ii",$categoryId,$status);
		}

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * Get categoies by categoryId
     */
    public function getcat($categoryId) {
        $stmt = $this->conn->prepare("SELECT name FROM categories where categoryId=?");
		$stmt->bind_param("i", $categoryId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }

    /**
     * Get user by userId
     */
    public function getUser($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM users where userId=?");
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }

    /**
     * Get user by username
     */
    public function getPubUserByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users where username=? AND account_type='Publisher' ");
        $stmt->bind_param("s", $username);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
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
     * Get restricted site by userId
     */
    public function getrestrictedsitesbyuserId($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM restricted_sites where userId=?");
		$stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * Get restricted site by restrictedId
     */
    public function getrestrictedsitesbyId($restrictedId) {
        $stmt = $this->conn->prepare("SELECT * FROM restricted_sites where restrictedId=?");
		$stmt->bind_param("i", $restrictedId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * Get users adcodes site by userId
     */
    public function getuseradcodesbyuserId($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM adcodes where userId=?");
		$stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
                return NULL;
        }
    }

    /**
     * Get ad by adId
     */
    public function getadbyadId($adId) {
        $stmt = $this->conn->prepare("SELECT * FROM ads where adId=?");
        $stmt->bind_param("i", $adId);
        if ($stmt->execute()) {
            $ad = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $ad;
            }else{
                return NULL;
        }
    }

     /**
     * Get adcode by adcodeId
     */
    public function getadcodebysiteId($siteId) {
        $stmt = $this->conn->prepare("SELECT * FROM adcodes where targetingsite=?");
        $stmt->bind_param("i", $siteId);
        if ($stmt->execute()) {
            $ad = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $ad;
            }else{
                return NULL;
        }
    }
    
    /**
     * Get all ads
     */
    public function getads() {
        $stmt = $this->conn->prepare("SELECT * FROM ads");
        if ($stmt->execute()) {
            $ad = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $ad;
            }else{
                return NULL;
        }
    }
	
	/**
     * Get user by ads
     */
    public function getuserads($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM ads where userId=?");
		$stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }

    /**
     * Get ads by condition
     */
    public function getadsbycond($userId,$adpricing, $status) {
        if($adpricing && $status){
            $stmt = $this->conn->prepare("SELECT * FROM ads where userId=? AND adtype=? AND status=?");
            $stmt->bind_param("isi",$userId, $adpricing, $status);
        } else if($adpricing){
            $stmt = $this->conn->prepare("SELECT * FROM ads where userId=? AND adtype=?");
            $stmt->bind_param("is",$userId, $adpricing);
        } else if($status){
            $stmt = $this->conn->prepare("SELECT * FROM ads where userId=? AND status=?");
            $stmt->bind_param("is",$userId, $status);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM ads where userId=? ORDER BY adId DESC");
			$stmt->bind_param("i",$userId);
        }

        if ($stmt->execute()) {
            $ads = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $ads;
            }else{
                return NULL;
        }
    }

    /**
     * Get adcodes by condition
     */
    public function getadcodesbycond($userId, $adpricing, $site) {
        if($adpricing && $site!=-1){
            $stmt = $this->conn->prepare("SELECT * FROM adcodes where userId=? AND adcode_type=? and targetingsite=? ");
            $stmt->bind_param("isi",$userId, $adpricing, $site);
        } else if ($adpricing){
            $stmt = $this->conn->prepare("SELECT * FROM adcodes where userId=? AND adcode_type=? ");
            $stmt->bind_param("is",$userId, $adpricing);
        } else if ($site!=-1) {
            $stmt = $this->conn->prepare("SELECT * FROM adcodes where userId=? AND targetingsite=? ");
            $stmt->bind_param("ii",$userId, $site);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM adcodes where userId=? ORDER BY adcodeId DESC");
            $stmt->bind_param("i",$userId);
        }

        if ($stmt->execute()) {
            $ads = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $ads;
            }else{
                return NULL;
        }
    }


	/**
     * Get adcodes by adcodeId
     */
    public function getadcodebyadcodeId($adcodeId) {
        $stmt = $this->conn->prepare("SELECT * FROM adcodes where adcodeId=?");
		$stmt->bind_param("i", $adcodeId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }

    /**
     * Get adcodeId by targeting site
     */
    public function getadcodeIdbySiteId($siteId) {
        $stmt = $this->conn->prepare("SELECT adcodeId FROM adcodes where targetingsite=?");
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
     * Get adcodes by siteId
     */
    public function getadcodebyadsiteId($siteId) {
        $stmt = $this->conn->prepare("SELECT * FROM adcodes WHERE targetingsite=?");
        $stmt->bind_param("i", $siteId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            if(isset($user['layout']))
                return $user['layout'];
            else
                return NULL;
        }else{
            return NULL;
        }
    }

    /**
     * Get OS list
     */
    public function getOSList() {
        $stmt = $this->conn->prepare("SELECT * FROM os");
        if ($stmt->execute()) {
            $os = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $os;
            }else{
               return NULL;
        }
    }

    /**
     * Get Browsers list
     */
    public function getBrowserList() {
        $stmt = $this->conn->prepare("SELECT * FROM browsers");
        if ($stmt->execute()) {
            $os = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $os;
            }else{
               return NULL;
        }
    }

    /**
     * Get Browser Id by name
     */
    public function getBrowserIdByName($browserName) {
        $stmt = $this->conn->prepare("SELECT browserId FROM browsers WHERE LOWER(name)=?");
        $stmt->bind_param("s", $browserName);
        if ($stmt->execute()) {
            $browserid = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $browserid;
            }else{
               return NULL;
        }
    }

    /**
     * Get Browser name by Id
     */
    public function getBrowserNameById($browserId) {
        $stmt = $this->conn->prepare("SELECT name FROM browsers WHERE browserId=?");
        $stmt->bind_param("i", $browserId);
        if ($stmt->execute()) {
            $browsername = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $browsername;
            }else{
               return NULL;
        }
    }

    /**
     * Get Language Id by code
     */
    public function getLanguageIdByCode($languageCode) {
        $stmt = $this->conn->prepare("SELECT id FROM language WHERE LOWER(code)=?");
        $stmt->bind_param("s", $languageCode);
        if ($stmt->execute()) {
            $languageid = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $languageid;
            }else{
               return NULL;
        }
    }

    /**
     * Get Language Id by code
     */
    public function getLanguageNameById($languageId) {
        $stmt = $this->conn->prepare("SELECT name FROM language WHERE id=?");
        $stmt->bind_param("i", $languageId);
        if ($stmt->execute()) {
            $languagename = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $languagename;
            }else{
               return NULL;
        }
    }

    /**
     * Get OS Id by name
     */
    public function getOSIdByName($osname) {
        $stmt = $this->conn->prepare("SELECT id FROM os WHERE LOWER(name)=?");
        $stmt->bind_param("s", $osname);
        if ($stmt->execute()) {
            $osid = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $osid;
            }else{
               return NULL;
        }
    }

    /**
     * Get OS name by id
     */
    public function getOSNameById($osId) {
        $stmt = $this->conn->prepare("SELECT name FROM os WHERE id=?");
        $stmt->bind_param("i", $osId);
        if ($stmt->execute()) {
            $osname = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $osname;
            }else{
               return NULL;
        }
    }

    /**
     * Get Language list
     */
    public function getLanguageList() {
        $stmt = $this->conn->prepare("SELECT * FROM language");
        if ($stmt->execute()) {
            $os = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $os;
            }else{
               return NULL;
        }
    }

    /**
     * Get Connection list
     */
    public function getConnectionList() {
        $stmt = $this->conn->prepare("SELECT * FROM connections");
        if ($stmt->execute()) {
            $os = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $os;
            }else{
               return NULL;
        }
    }

    /**
     * Get Connection list
     */
    public function getConnectionNameById($connectionId) {
        $stmt = $this->conn->prepare("SELECT name FROM connections WHERE connectionId=?");
        $stmt->bind_param("i", $connectionId);
        if ($stmt->execute()) {
            $connectionname = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $connectionname;
            }else{
               return NULL;
        }
    }

    /**
     * Get Country list
     */
    public function getCountryList() {
        $stmt = $this->conn->prepare("SELECT * FROM countries");
        if ($stmt->execute()) {
            $os = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $os;
        }else{
            return NULL;
        }
    }

    /**
     * Get Country Id by code
     */
    public function getCountryIdByCode($countryCode) {
        $stmt = $this->conn->prepare("SELECT id FROM countries WHERE LOWER(code)=?");
        $stmt->bind_param("s", $countryCode);
        if ($stmt->execute()) {
            $languageid = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $languageid;
            }else{
               return NULL;
        }
    }

    /**
     * Get Site by siteId
     */
    public function getAdvertiserSiteById($siteId) {
        $stmt = $this->conn->prepare("SELECT site FROM advertiser_sites WHERE siteId=?");
        $stmt->bind_param("i", $siteId);
        if ($stmt->execute()) {
            $languagename = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $languagename;
        }else{
            return "-NA-";
        }
    }
	
    /**
     * Get Site by siteId
     */
    public function getPublisherSiteById($siteId,$userId) {
        $stmt = $this->conn->prepare("SELECT url FROM publisher_sites WHERE siteId=? and userId=?");
        $stmt->bind_param("ii", $siteId,$userId);
        if ($stmt->execute()) {
            $languagename = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $languagename;
        }else{
            return "-NA-";
        }
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
     * Get sites adcodes by Ad Code Type and site
     */
    public function getuseradcodesbysrc($userId,$adcode_type,$targetingsite) { 
		if($adcode_type=="All"){
			if($targetingsite=="none"){
				$stmt = $this->conn->prepare("SELECT * FROM adcodes WHERE userId=? ");
				$stmt->bind_param("i", $userId);		
			}else{
				$stmt = $this->conn->prepare("SELECT * FROM adcodes WHERE targetingsite=?");
				$stmt->bind_param("i",$targetingsite);
			}		
		} 
		else{
			if($targetingsite=="none"){
				$stmt = $this->conn->prepare("SELECT * FROM adcodes WHERE adcode_type=?");
				$stmt->bind_param("s",$adcode_type);
			}else{
				$stmt = $this->conn->prepare("SELECT * FROM adcodes WHERE adcode_type=? AND targetingsite=?");
			$stmt->bind_param("si",$adcode_type,$targetingsite);
			}
		}

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * get ad selected targetring locations 
     */
    public function getadtargetlocations($adId) { 
        $stmt = $this->conn->prepare("SELECT * FROM targeting_location WHERE adId = ? ");
		$stmt->bind_param("i", $adId);
		if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }

    /**
     * get targetring locations 
     */
    public function gettargetlocations($adId, $userId) { 
        $stmt = $this->conn->prepare("SELECT * FROM targeting_location WHERE adId = ? AND userId=?");
        $stmt->bind_param("ii", $adId, $userId);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }

	/**
     * get ad selected targetring categoies 
     */
    public function getadtargetcategories($adId) { 
        $stmt = $this->conn->prepare("SELECT * FROM targeting_category WHERE adId = ? ");
		$stmt->bind_param("i", $adId);
		if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * get ad selected targetring devices 
     */
    public function getadtargetdevices($adId) { 
        $stmt = $this->conn->prepare("SELECT * FROM targeting_device WHERE adId = ? ");
		$stmt->bind_param("i", $adId);
		if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * get ad selected targetring os 
     */
    public function getadtargetos($adId) { 
        $stmt = $this->conn->prepare("SELECT * FROM targeting_os WHERE adId = ? ");
		$stmt->bind_param("i", $adId);
		if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * get ad selected targetring browsers
     */
    public function getadtargetbrowsers($adId) {
        $stmt = $this->conn->prepare("SELECT * FROM targeting_browsers WHERE adId = ? ");
		$stmt->bind_param("i", $adId);
		if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
	
	/**
     * get ad selected targetring connections
     */
    public function getadtargetconnections($adId) {
        $stmt = $this->conn->prepare("SELECT * FROM targeting_connection WHERE adId = ? ");
		$stmt->bind_param("i", $adId);
		if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }

	/**
     * get ad selected targetring languages
     */
    public function getadtargetlanguage($adId) {
        $stmt = $this->conn->prepare("SELECT * FROM targeting_language WHERE adId = ? ");
		$stmt->bind_param("i", $adId);
		if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }

    /**
     * get all ads for visitor
     */
    public function getadsforvisitor($lang, $ctcode, $browser, $os) {
        $langId = $countryId = $browserId = $osId = "";
        if($lang != "")
            $langId = $this->getLanguageIdByCode($lang)['id'];
        if($ctcode != "")
            $countryId = $this->getCountryIdByCode($ctcode)['id'];
        if($browser != "")
            $browserId = $this->getBrowserIdByName(strtolower($browser))['browserId'];
        if($os != "")
            $osId = $this->getOSIdByName(strtolower($os))['id'];

        $sqlstr = "SELECT * FROM ads ";
        $condition = "WHERE ";
        if($langId){
            $sqlstr .= "INNER JOIN targeting_language ON ads.adId=targeting_language.adId ";
            if($condition == "WHERE ")
                $condition.="targeting_language.language=? AND ads.flag_language=1 ";
            else 
                $condition.="AND targeting_language.language=? AND ads.flag_language=1 ";
        }

        if($ctcode){
            $sqlstr.="INNER JOIN targeting_location ON ads.adId=targeting_location.adId ";
            if($condition == "WHERE ")
                $condition.="targeting_location.country_code=? AND ads.flag_location=1 ";
            else 
                $condition.="AND targeting_location.country_code=? AND ads.flag_location=1 ";
        }

        if($browserId){
            $sqlstr.="INNER JOIN targeting_browsers ON ads.adId=targeting_browsers.adId ";
            if($condition == "WHERE ")
                $condition.="targeting_browsers.browserId=? AND ads.flag_browser=1 ";
            else 
                $condition.="AND targeting_browsers.browserId=? AND ads.flag_browser=1 ";
        }

        if($osId){
            $sqlstr.="INNER JOIN targeting_os ON ads.adId=targeting_os.adId ";
            if($condition == "WHERE ")
                $condition.="targeting_os.os=? AND ads.flag_os=1 ";
            else 
                $condition.="AND targeting_os.os=? AND ads.flag_os=1 ";
        }

        if($condition == "WHERE ")
            $sql = $sqlstr." ORDER BY default_clickvalue DESC";
        else
            $sql = $sqlstr.$condition." ORDER BY default_clickvalue DESC";

        $stmt = $this->conn->prepare($sql);
        if($langId && $ctcode && $browserId && $osId)
            $stmt->bind_param("isii", $langId,$ctcode,$browserId,$osId);
        else if($ctcode && $browserId && $osId)
            $stmt->bind_param("sii",$ctcode,$browserId,$osId);
        else if($langId && $browserId && $osId)
            $stmt->bind_param("iii", $langId,$browserId,$osId);
        else if($langId && $ctcode && $osId)
            $stmt->bind_param("isi", $langId,$ctcode,$osId);
        else if($langId && $ctcode && $browserId)
            $stmt->bind_param("isi", $langId,$ctcode,$browserId);
        else if($browserId && $osId)
            $stmt->bind_param("ii",$browserId,$osId);
        else if($langId && $ctcode)
            $stmt->bind_param("is", $langId,$ctcode);
        else if($langId && $osId)
            $stmt->bind_param("isii", $langId,$osId);
        else if($ctcode && $browserId)
            $stmt->bind_param("si", $ctcode,$browserId);
        else if($langId && $browserId)
            $stmt->bind_param("ii", $langId,$browserId);
        else if($ctcode && $osId)
            $stmt->bind_param("si", $ctcode,$osId);
        else if($langId)
            $stmt->bind_param("i", $langId);
        else if($ctcode)
            $stmt->bind_param("s", $ctcode);
        else if($browserId)
            $stmt->bind_param("i", $browserId);
        else if($osId)
            $stmt->bind_param("i", $osId);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $user;
        }else{
            return NULL;
        }
    }

    /**
     * Get credit text
     */
    public function getCredittext() {
        $stmt = $this->conn->prepare("SELECT * FROM credittext");
        if ($stmt->execute()) {
            $history = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $history;
            }else{
                return NULL;
        }
    }

    /**
     * Fetch dispaly pop ad for visitors
     */
    public function getAdforVisitor() {
        $stmt = $this->conn->prepare("SELECT * FROM ads WHERE adtype='POP' ORDER BY default_clickvalue DESC ");
        if ($stmt->execute()) {
            $ad = $stmt->get_result()->fetch_assoc();
        $stmt->close();
            return $ad;
        }else{
            return NULL;
        }
    }

    /**
     * Fetch dispaly pop adCode for visitors
     */
    public function getAdCodeforVisitor($siteId) {
        $stmt = $this->conn->prepare("SELECT * FROM adcodes WHERE adcode_type='POP' AND targetingsite=? ");

        $stmt->bind_param("i", $siteId);
        if ($stmt->execute()) {
            $ad = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $ad;
        } else{
            return NULL;
        }
    }

    /**
     * get adunits by uid
     */
    /*public function getAdunitsById($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM adunit WHERE pubid=? ");

        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            $ad = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $ad;
        } else{
            return NULL;
        }
    }*/
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
     * Get all images for ad
     */
    public function getImagesforAd($adId) {
        $stmt = $this->conn->prepare("SELECT * FROM adimages where adId=?");
        $stmt->bind_param("i", $adId);
        if ($stmt->execute()) {
            $images = $stmt->get_result()->fetch_all();
            $stmt->close();
            return $images;
        }else{
            return NULL;
        }
    }

    /**
     * Get first image for ad
     */
    public function getImageforAd($adId) {
        $stmt = $this->conn->prepare("SELECT * FROM adimages where adId=?");
        $stmt->bind_param("i", $adId);
        if ($stmt->execute()) {
            $image = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $image;
        }else{
            return NULL;
        }
    }

    /**
     * Check image for ad
     */
    public function isExistImg($imagename, $adid) {
        $stmt = $this->conn->prepare("SELECT imageId FROM adimages WHERE adId=? AND imagename=? ");
        $stmt->bind_param("is", $adid, $imagename);

        if ($stmt->execute()) {
            $adimage = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            if($adimage)
                return true;
            else
                return false;
        } else
            return false;
    }

    public function getOS($user_agent) { 
        $os_platform    =   "Unknown OS Platform";
        $os_array       =   array(
                                '/windows nt 10/i'     =>  'Windows',
                                '/windows nt 6.3/i'     =>  'Windows 8.1',
                                '/windows nt 6.2/i'     =>  'Windows 8',
                                '/windows nt 6.1/i'     =>  'Windows 7',
                                '/windows nt 6.0/i'     =>  'Windows Vista',
                                '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                                '/windows nt 5.1/i'     =>  'Windows XP',
                                '/windows xp/i'         =>  'Windows XP',
                                '/windows nt 5.0/i'     =>  'Windows 2000',
                                '/windows me/i'         =>  'Windows ME',
                                '/win98/i'              =>  'Windows 98',
                                '/win95/i'              =>  'Windows 95',
                                '/win16/i'              =>  'Windows 3.11',
                                '/macintosh|mac os x/i' =>  'Mac OS X',
                                '/mac_powerpc/i'        =>  'Mac OS 9',
                                '/linux/i'              =>  'Linux',
                                '/ubuntu/i'             =>  'Ubuntu',
                                '/iphone/i'             =>  'iPhone',
                                '/ipod/i'               =>  'iPod',
                                '/ipad/i'               =>  'iPad',
                                '/android/i'            =>  'Android',
                                '/blackberry/i'         =>  'BlackBerry',
                                '/webos/i'              =>  'Mobile'
                            );
        foreach ($os_array as $regex => $value) { 
            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }
        }   
        return $os_platform;
    }

    public function getBrowser() 
    { 
        $u_agent = $_SERVER['HTTP_USER_AGENT']; 
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }
        
        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
        { 
            $bname = 'Internet Explorer'; 
            $ub = "MSIE"; 
        } 
        elseif(preg_match('/Firefox/i',$u_agent)) 
        { 
            $bname = 'Mozilla Firefox'; 
            $ub = "Firefox"; 
        } 
        elseif(preg_match('/Chrome/i',$u_agent)) 
        { 
            $bname = 'Chrome'; 
            $ub = "Chrome"; 
        } 
        elseif(preg_match('/Safari/i',$u_agent)) 
        { 
            $bname = 'Apple Safari'; 
            $ub = "Safari"; 
        } 
        elseif(preg_match('/Opera/i',$u_agent)) 
        { 
            $bname = 'Opera'; 
            $ub = "Opera"; 
        } 
        elseif(preg_match('/Netscape/i',$u_agent)) 
        { 
            $bname = 'Netscape'; 
            $ub = "Netscape"; 
        } 
        
        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }
        
        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }
        
        // check if we have a number
        if ($version==null || $version=="") {$version="?";}
        
        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    } 

    /**
     * Check banned user
     */
    public function bannedUser($ipaddress) {
        $stmt = $this->conn->prepare("SELECT * FROM blacklist WHERE bannedip=? ");
        $stmt->bind_param("s", $ipaddress);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return NULL;
        }
    }

    /**
     * Count ad's images 
     */
    public function countadsimg($adId) { 
        $stmt = $this->conn->prepare("SELECT COUNT(imageId) AS img_count FROM adimages WHERE adId=?");
        $stmt->bind_param("i", $adId);
		if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
                return $user;
            }else{
            return NULL;
        }
    }
}
?>