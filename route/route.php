<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'Home';
    $page = '';
}
switch ($page) {

    case "":
            $src_page = 'home-page.php';
            $title = "Dashboard";
            break; 

    case "Home":
            $src_page = 'home-page.php';
            $title = "Dashboard";
            break;
    

    case "test":
           $src_page = 'views/pages/project_contract/test.php';
            $title = "ทดสอบ";
            break;


    case "stock":
            $src_page = 'views/pages/stock/stock_list.php';
            $title = "stock";
            break;

    case "matirial":
            $src_page = 'views/pages/stock/mat-info_list.php';
            $title = "mat";
            break;
        // ?page=Activity

    case "Activity":
            $src_page = 'views/pages/stock/mat-activity.php';
            $title = "ทำรายการ";
            break;
    case "cart":
            $src_page = 'views/pages/stock/cart.php';
            $title = "ทำรายการ";
            break;

    case "confirm":
            $src_page = 'views/pages/stock/confirm.php';
            $title = "confirm";
            break;
     //WaittingApprove
    case "WaittingApprove":
            $src_page = 'views/pages/stock/waiting_approve.php';
            $title = "confirm";
            break;
     //Approved
     case "Approved":
        $src_page = 'views/pages/stock/approved_list.php';
        $title = "Approved-List";
        break;

     //UserReques


     case "UserReques":
        $src_page = 'views/pages/stock/user_reques.php';
        $title = "UserReques";
        break;

    // withdraw-detail

        case "withdraw-detail":
            $src_page = 'views/pages/stock/withdraw-detail.php';
            $title = " รายละเอียดของการเบิก";
            break;

    //Allwithdraw
    case "Allwithdraw":
        $src_page = 'views/pages/stock/all-withdraw.php';
        $title = " รายใบเบิก";
        break;


    //information
    case "Information":
        $src_page = 'views/pages/information/inform.php';
        $title = "ข้อมูลหน่วยงาน";
        break;
    

    // รายงานต่างๆ
    case "Report":
        $src_page = 'views/pages/report/report.php';
        $title = "รายงาน";
   
    
// page=UserManager
    case "Profiles":
        $src_page = 'views/pages/user_manager/user_profile.php';
        $title = "Profile";
        break;
    
    case "add-from":
          $src_page = 'views/pages/user_manager/add_from.php';
          $title = "Profile";
          break;

    case "UserManager":
            $src_page = 'views/pages/user_manager/manager.php';
            $title = "User Manager";
            break;

            //UserManager

     case "AdminManager":
            $src_page = 'views/pages/user_manager/admin-manager.php';
            $title = "Admin Manager";
            break;
    
    case "UserProfile":
            $src_page = 'views/pages/user_manager/user_profile.php';
            $title = "User Profile";
            break;
            
    case "ProfileEdit":
            $src_page = 'views/pages/user_manager/profile_edit.php';
            $title = "ปรับปรุงข้อมูล";
            break;
  


        //Asset-System
    case "Asset-System":
        $src_page = 'views/pages/asset/asset-list.php';
        $title = "ระบบจัดเก็บข้อมูลครุภัณฑ์";
        break;

        //asset-add
    case "asset-add":
        $src_page = 'views/pages/asset/asset-add.php';
        $title = "เพิ่มรายการครุภัณฑ์";
        break;

         //asset-add
    case "asset-view":
        $src_page = 'views/pages/asset/asset-view.php';
        $title = "รายละเอียดครุภัณฑ์";
        break;

         //asset-edit
    case "asset-edit":
        $src_page = 'views/pages/asset/asset-edit.php';
        $title = "ปรับปรุงข้อมูลครุภัณฑ์";
        break;

    
    //information _Division
    case "DivisionList":
        $src_page = 'views/pages/information/division_list.php';
        $title = "  รายการ สำนัก/กอง";
        break;
 
 
    //information _part
        case "PartList":
    $src_page = 'views/pages/information/part_list.php';
    $title = " ส่วน ";
    break;


    //information
    case "SubDivisionList":
        $src_page = 'views/pages/information/subdivision_list.php';
        $title = "  รายการ ฝ่าย";
        break;

    //information _Section
    case "workList":
        $src_page = 'views/pages/information/work_list.php';
        $title = "สายงาน";
        break;
    
        
   //institution_list
   case "LocationList":
    $src_page = 'views/pages/information/location_list.php';
    $title = " สถานที่/สถานีย่อย";
    break;

    //position_list

    case "position":
        $src_page = 'views/pages/information/position_list.php';
        $title = "ตำแหน่งงานของ อปท.";
        break;


             //import
    case "ImportContrac":
        $src_page = 'views/pages/import_csv/import-contrac.php';
        $title = "นำเข้าข้อมูลบริษัทผู้รับจ้าง";
        break;

    case "ImportAcceptance":
        $src_page = 'views/pages/import_csv/import-acceptance.php';
        $title = "นำเข้าเอกสารตรวจรับงาน";
        break;

    case "ImportAsset":
        $src_page = 'views/pages/import_csv/import-asset.php';
        $title = "นำเข้าข้อมูลครุภันฑ์";
        break;
        //Import-treasury
    case "Import-treasury":
        $src_page = 'views/pages/import_csv/import-treasury.php';
        $title = "นำเข้าข้อมูลครุภันฑ์";
        break;
                   //?page=map

    case "map":
        $src_page = 'views/pages/map/map.php';
        $title = "สถานที่ตั้ง";
        break;

               // Search
    case "Search":
        $src_page = 'views/pages/search/search.php';
        $title = "ค้นหาข้อมูล";
        break;
}
?>


   