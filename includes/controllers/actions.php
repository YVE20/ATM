<?php

##################################
###           ACTIONS          ###
##################################

switch ($_POST['action']) {
           //JOB
        case "addJob":
            //isAuthorized("addJob");
            $status = Job::addJob($_POST);
            break;
        case "editJob":
            //isAuthorized("editJob");
            $status = Job::editJob($_POST);
            break;
        case "deleteJob":
            //isAuthorized("deleteJob");
            $status = Job::deleteJob($_POST);
            break;

        //PO
        case "addPo":
            //isAuthorized("addPo");
            $status = Po::addPo($_POST);
            break;
        case "editPo":
            //isAuthorized("editPo");
            $status = Po::editPo($_POST);
            break;
        case "deletePo":
            //isAuthorized("deletePo");
            $status = Po::deletePo($_POST);
            break;

        //Vendor
    case "addVendor":
        //isAuthorized("addVendor");
        $status = Vendor::addVendor($_POST);
        break;
    case "editVendor":
        //isAuthorized("editVendor");
        $status = Vendor::editVendor($_POST);
        break;
    case "deleteVendor":
        //isAuthorized("deleteVendor");
        $status = Vendor::deleteVendor($_POST);
        break;
        
        //Vendor Person
    case "addVendorPerson":
        //isAuthorized("addVendorPerson");
        $status = VendorPerson::addVendorPerson($_POST);
        break;
    case "editVendorPerson":
        //isAuthorized("editVendor");
        $status = VendorPerson::editVendorPerson($_POST);
        break;
    case "deleteVendorPerson":
        //isAuthorized("deleteVendorPerson");
        $status = VendorPerson::deleteVendorPerson($_POST);
        break;
        
        //Vendor Bank
    case "addVendorBank":
        //isAuthorized("addVendorBank");
        $status = VendorBank::addVendorBank($_POST);
        break;
    case "editVendorBank":
        //isAuthorized("editVendorBank");
        $status = VendorBank::editVendorBank($_POST);
        break;
    case "deleteVendorBank":
        //isAuthorized("deleteVendorBank");
        $status = VendorBank::deleteVendorBank($_POST);
        break; 

        //Vendor Services
    case "addService":
        //isAuthorized("addService");
        $status = VendorServices::addService($_POST);
        break;

    case "editService":
        //isAuthorized("editService");
        $status = VendorServices::editService($_POST);
        break;
        
    case "updateService":
        //isAuthorized("updateService");
        $status = VendorServices::updateService($_POST);
        break;

    //Vendor Generate Key
    case "addVendorgeneratekey":
        //isAuthorized("addVendorgeneratekey");
        $status = VendorGenerateKey::addVendorgeneratekey($_POST);
        break;
    
    //Sign Up Vendor
    case "addVendorSignUp":
        //isAuthorized("addVendorSignUp");
        $status = VendorSignUp::addVendorSignUp($_POST);
        break;
        
    //Kategori
    case "addKategori":
        //isAuthorized("addKategori");
        $status = Kategori::addKategori($_POST);
        break;
    case "editKategori":
        //isAuthorized("editKategori");
        $status = Kategori::editKategori($_POST);
        break;
    case "deleteKategori":
        //isAuthorized("deleteKategori");
        $status = Kategori::deleteKategori($_POST);
        break;

    //SubKategori
    case "addSubKategori":
        //isAuthorized("addSubKategori");
        $status = SubKategori::addSubKategori($_POST);
        break;
    case "editSubKategori":
        //isAuthorized("editSubKategori");
        $status = SubKategori::editSubKategori($_POST);
        break;
    case "deleteSubKategori":
        //isAuthorized("deleteSubKategori");
        $status = SubKategori::deleteSubKategori($_POST);
        break;
            
    //Bank
    case "addBank":
        //isAuthorized("addBank");
        $status = Bank::addBank($_POST);
        break;
    case "editBank":
        //isAuthorized("editBank");
        $status = Bank::editBank($_POST);
        break;
    case "deleteBank":
        //isAuthorized("deleteBank");
        $status = Bank::deleteBank($_POST);
        break;

    //Pengadaan
    case "addPengadaan":
        //isAuthorized("addPengadaan");
        $status = Pengadaan::addPengadaan($_POST);
        break;
    case "editPengadaan":
        //isAuthorized("editPengadaan");
        $status = Pengadaan::editPengadaan($_POST);
        break;
    case "deletePengadaan":
        //isAuthorized("deletePengadaan");
        $status = Pengadaan::deletePengadaan($_POST);
        break;

        //Pengadaan Acuan
    case "addPengadaanAcuan":
        //isAuthorized("addPengadaanAcuan");
        $status = PengadaanAcuan::addPengadaanAcuan($_POST);
        break;
    case "editPengadaanAcuan":
        //isAuthorized("editPengadaanAcuan");
        $status = PengadaanAcuan::editPengadaanAcuan($_POST);
        break;
    case "deletePengadaanAcuan":
        //isAuthorized("deletePengadaanAcuan");
        $status = PengadaanAcuan::deletePengadaanAcuan($_POST);
        break;
    case "calculationGuardrailReffDetail":
        $status =  PengadaanAcuan::calculationGuardrailReffDetail($_POST);
        break;
    
    //Department
    case "addDepartment":
        //isAuthorized("addPDepartment");
        $status = Department::addDepartment($_POST);
        break;
    case "editDepartment":
        //isAuthorized("editDepartment");
        $status = Department::editDepartment($_POST);
        break;
    case "deleteDepartment":
        //isAuthorized("deletePDepartment");
        $status = Department::deleteDepartment($_POST);
        break;

        
        // Size Cat
    case "addSizeCat":
        //isAuthorized("manageData");
        $status = Master::addSizeCat($_POST);
        break;
    case "editSizeCat":
        //isAuthorized("manageData");
        $status = Master::editSizeCat($_POST);
        break;
    case "deleteSizeCat":
        //isAuthorized("manageData");
        $status = Master::deleteSizeCat($_POST);
        break;

        // Size
    case "addSize":
        //isAuthorized("manageData");
        $status = Master::addSize($_POST);
        break;
    case "editSize":
        //isAuthorized("manageData");
        $status = Master::editSize($_POST);
        break;
    case "deleteSize":
        //isAuthorized("manageData");
        $status = Master::deleteSize($_POST);
        break;

    
        //Tender
    case "addTender":
        //isAuthorized("addTender");
        $status = Tender::addTender($_POST);
        break;
    case "editTender":
        //isAuthorized("editTender");
        $status = Tender::editTender($_POST);
        break;
    case "deleteTender":
        //isAuthorized("deleteTenders");
        $status = Tender::deleteTender($_POST);
        break;
    case "editStatusTender":
        //isAuthorized("editStatusTender");
        $status = Tender::editStatusTender($_POST);
        break;
    case "detailStatus":
        //isAuthorized("detailStatus");
        $status = Tender::detailStatus($_POST);
        break;
    
    case "addItemTender":
        //isAuthorized("addItemTender");
        $status = Tender::addItemTender($_POST);
        break;
    case "editItemTender":
        //isAuthorized("editItemTender");
        $status = Tender::editItemTender($_POST);
        break;
    case "deleteItemsTender":
        //isAuthorized("deleteItemsTender");
        $status = Tender::deleteItemsTender($_POST);
        break;

    case "addVendorTender":
        //isAuthorized("addVendorTender");
        $status = Tender::addVendorTender($_POST);
        break;
    case "deleteVendorTender":
        //isAuthorized("deleteVendorTender");
        $status = Tender::deleteVendorTender($_POST);
        break;
    case "sendWa":
        //isAuthorized("sendWa");
        $status = Tender::sendWa($_POST);
        break;
    case "sendWa1":
        //isAuthorized("sendWa1");
        $status = Tender::sendWa1($_POST);
        break;
    case "sendEmail":
        //isAuthorized("sendEmail");
        $status = Tender::sendEmail($_POST);
        break;
    case "sendEmail1":
        //isAuthorized("sendEmail1");
        $status = Tender::sendEmail1($_POST);
        break;
        //Penawaran Tender
    case "addPenawaran":
        //isAuthorized("addPenawaran");
        $status = Tender::addPenawaran($_POST);
        break;
    case "addPenawaran1":
        //isAuthorized("addPenawaran");
        $status = Tender::addPenawaran1($_POST);
        break; 
    case "deletePenawaran":
        //isAuthorized("deletePenawaran");
        $status = Tender::deletePenawaran($_POST);
        break;    
    case "deleteOffer":
        $status = Tender::deleteOffer($_POST);
        break;    
    case "deleteEvaluationResult":
        $status = Tender::deleteEvaluationResult($_POST);
        break;
    case "deleteCriteria":
        $status = Tender::deleteCriteria($_POST);
        break;

    case "editPenawaran":
        $status = Tender::editPenawaran($_POST);
        break;      

    case "editEvaluationResult":
        $status = Tender::editEvaluationResult($_POST);
        break;
    case "editInstruction":
        $status = Tender::editInstruction($_POST);
        break;
    case "editCriteria":
        $status = Tender::editCriteria($_POST);
        break;
    case "checkExpedisi" :
        $status = Tender::checkExpedisi($_POST);
        break;

        // files
    case "uploadFile":
        isAuthorized("uploadFile");
        $status = File::upload($_POST, $_FILES);
        break;

    case "uploadAllFile":
        $status = File::uploadAll($_POST, $_FILES);
        break;

    case "deleteFile":
        isAuthorized("deleteFile");
        $status = File::delete($_POST['id']);
        break;


        // issues
    case "addIssue":
        isAuthorized("addIssue");
        $status = Issue::add($_POST);
        break;

    case "editIssue":
        isAuthorized("editIssue");
        $status = Issue::edit($_POST);
        break;

    case "deleteIssue":
        $status = Issue::delete($_POST['id']);
        break;

    case "addIssueReply":
        $status = Issue::addReply($_POST);
        break;

        // clients
    case "addClient":
        isAuthorized("addClient");
        $status = Client::add($_POST);
        break;

    case "editClient":
        isAuthorized("editClient");
        $status = Client::edit($_POST);
        break;

    case "deleteClient":
        isAuthorized("deleteClient");
        $status = Client::delete($_POST['id']);
        break;

    case "addAdminAssignment":
        isAuthorized("adminsClient");
        $status = Client::assignStaff($_POST);
        break;

    case "deleteAdminAssignment":
        isAuthorized("adminsClient");
        $status = Client::unassignStaff($_POST['id']);
        break;

        // users
    case "addUser":
        isAuthorized("addUser");
        $status = User::add($_POST);
        break;

    case "editUser":
        isAuthorized("editUser");
        $status = User::edit($_POST);
        break;

    case "deleteUser":
        isAuthorized("deleteUser");
        $status = User::delete($_POST['id']);
        break;


        // staff
    case "addAdmin":
        isAuthorized("addStaff");
        $status = Staff::add($_POST);
        break;

    case "editAdmin":
        isAuthorized("editStaff");
        $status = Staff::edit($_POST);
        break;

    case "deleteAdmin":
        isAuthorized("deleteStaff");
        $status = Staff::delete($_POST['id']);
        break;

        // status labels
    case "addLabel":
        isAuthorized("manageData");
        $status = Attribute::addLabel($_POST);
        break;

    case "editLabel":
        isAuthorized("manageData");
        $status = Attribute::editLabel($_POST);
        break;

    case "deleteLabel":
        isAuthorized("manageData");
        $status = Attribute::deleteLabel($_POST['id']);
        break;

        // locations
    case "addLocation":
        isAuthorized("manageData");
        $status = Attribute::addLocation($_POST);
        break;

    case "editLocation":
        isAuthorized("manageData");
        $status = Attribute::editLocation($_POST);
        break;

    case "deleteLocation":
        isAuthorized("manageData");
        $status = Attribute::deleteLocation($_POST['id']);
        break;

        // contacts
    case "addContact":
        isAuthorized("addContact");
        $status = Contact::add($_POST);
        break;

    case "editContact":
        isAuthorized("editContact");
        $status = Contact::edit($_POST);
        break;

    case "deleteContact":
        isAuthorized("deleteContact");
        $status = Contact::delete($_POST['id']);
        break;

        // roles
    case "addRole":
        isAuthorized("addRole");
        $status = Role::add($_POST);
        break;

    case "editRole":
        isAuthorized("editRole");
        $status = Role::edit($_POST);
        break;

    case "deleteRole":
        isAuthorized("deleteRole");
        $status = Role::delete($_POST['id']);
        break;


        // escalation rules
    case "addEscalationRule":
        $status = Ticket::addRule($_POST);
        break;

    case "editEscalationRule":
        $status = Ticket::editRule($_POST);
        break;

    case "deleteEscalationRule":
        $status = Ticket::deleteRule($_POST['id']);
        break;


        // predefined replies
    case "addPReply":
        isAuthorized("addPReply");
        $status = PReply::add($_POST);
        break;

    case "editPReply":
        isAuthorized("editPReply");
        $status = PReply::edit($_POST);
        break;

    case "addComponentReply":
        isAuthorized("manageTicket");
        $status = Asset::addComponentReply($_POST);
        break;

    case "editComponentReply":
        isAuthorized("manageTicket");
        $status = Asset::editComponentReply($_POST);
        break;

    case "deletePReply":
        isAuthorized("deletePReply");
        $status = PReply::delete($_POST['id']);
        break;

        // languages
    case "addLanguage":
        isAuthorized("manageSettings");
        $status = Settings::addLanguage($_POST);
        break;

    case "deleteLanguage":
        isAuthorized("manageSettings");
        $status = Settings::deleteLanguage($_POST['id']);
        break;

        // support departments
    case "addDepartment":
        isAuthorized("manageSettings");
        $status = Settings::addDepartment($_POST);
        break;

    case "editDepartment":
        isAuthorized("manageSettings");
        $status = Settings::editDepartment($_POST);
        break;

    case "deleteDepartment":
        isAuthorized("manageSettings");
        $status = Settings::deleteDepartment($_POST['id']);
        break;


        // profile
    case "editProfile":
        $status = Profile::edit($_POST, $_FILES);
        break;


        //settings
    case "generalSettings":
        isAuthorized("manageSettings");
        Settings::update("app_name", $_POST['app_name']);
        Settings::update("app_url", $_POST['app_url']);
        Settings::update("company_name", $_POST['company_name']);
        Settings::update("company_manager", $_POST['company_manager']);
        Settings::update("company_details", $_POST['company_details']);
        Settings::update("log_retention", $_POST['log_retention']);
        Settings::update("table_records", $_POST['table_records']);
        Settings::update("license_tag_prefix", $_POST['license_tag_prefix']);
        Settings::update("asset_tag_prefix", $_POST['asset_tag_prefix']);
        Settings::update("password_generator_length", $_POST['password_generator_length']);
        $status = 40;
        break;

    case "localisationSettings":
        isAuthorized("manageSettings");
        Settings::update("week_start", $_POST['week_start']);
        Settings::update("default_lang", $_POST['default_lang']);
        Settings::update("timezone", $_POST['timezone']);
        $status = 40;
        break;

    case "emailSettings":
        isAuthorized("manageSettings");
        Settings::update("email_from_address", $_POST['email_from_address']);
        Settings::update("email_from_name", $_POST['email_from_name']);
        Settings::update("email_smtp_host", $_POST['email_smtp_host']);
        Settings::update("email_smtp_port", $_POST['email_smtp_port']);
        Settings::update("email_smtp_username", $_POST['email_smtp_username']);
        Settings::update("email_smtp_password", $_POST['email_smtp_password']);
        Settings::update("email_smtp_security", $_POST['email_smtp_security']);
        if (isset($_POST['email_smtp_auth']))
            $email_smtp_auth = "true";
        else
            $email_smtp_auth = "false";
        Settings::update("email_smtp_auth", $email_smtp_auth);
        if (isset($_POST['email_smtp_enable']))
            $email_smtp_enable = "true";
        else
            $email_smtp_enable = "false";
        Settings::update("email_smtp_enable", $email_smtp_enable);
        Settings::update("email_smtp_domain", $_POST['email_smtp_domain']);
        $status = 40;
        break;

    case "smsSettings":
        isAuthorized("manageSettings");
        Settings::update("sms_provider", $_POST['sms_provider']);
        Settings::update("sms_user", $_POST['sms_user']);
        Settings::update("sms_password", $_POST['sms_password']);
        Settings::update("sms_api_id", $_POST['sms_api_id']);
        Settings::update("sms_from", $_POST['sms_from']);
        $status = 40;
        break;

    case "ticketsSettings":
        isAuthorized("manageSettings");
        Settings::update("tickets_comreply", $_POST['comreply']);
        Settings::update("tickets_server", $_POST['tickets_server']);
        Settings::update("tickets_username", $_POST['tickets_username']);
        Settings::update("tickets_password", $_POST['tickets_password']);
        Settings::update("tickets_encrypton", $_POST['tickets_encrypton']);
        Settings::update("tickets_defaultdepartment", $_POST['tickets_defaultdepartment']);
        if (isset($_POST['tickets_notification']))
            $tickets_notification = "true";
        else
            $tickets_notification = "false";
        Settings::update("tickets_notification", $tickets_notification);
        Settings::update("auto_close_tickets", $_POST['auto_close_tickets']);
        if (isset($_POST['auto_close_tickets_notify']))
            $auto_close_tickets_notify = "true";
        else
            $auto_close_tickets_notify = "false";
        Settings::update("auto_close_tickets_notify", $auto_close_tickets_notify);
        $status = 40;
        break;

    case "editNotificationTemplate":
        isAuthorized("manageSettings");
        $status = Settings::editNotification($_POST);
        break;
}


reroute($_POST, $status);
