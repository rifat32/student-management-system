<?php

return [
    "roles_permission" => [
        [
            "role" => "superadmin",
            "permissions" => [
                "global_business_background_image_create",
                "global_business_background_image_view",

                "module_update",
                "module_view",


                "business_tier_create",
                "business_tier_update",
                "business_tier_view",
                "business_tier_delete",

                "work_shift_update",
                "work_shift_view",



       "user_create",
       "user_update",
       "user_view",
       "user_delete",

       "role_create",
       "role_update",
       "role_view",
       "role_delete",

       "business_create",
       "business_update",
       "business_view",
       "business_delete",

       "template_create",
       "template_update",
       "template_view",
       "template_delete",

       "payment_type_create",
       "payment_type_update",
       "payment_type_view",
       "payment_type_delete",


"product_category_create",
"product_category_update",
"product_category_view",
"product_category_delete",

"product_create",
"product_update",
"product_view",
"product_delete",

"job_platform_create",
"job_platform_update",
"job_platform_view",
"job_platform_delete",

"social_site_create",
"social_site_update",
"social_site_view",
"social_site_delete",




"designation_create",
"designation_update",
"designation_view",
"designation_delete",

"job_type_create",
"job_type_update",
"job_type_view",
"job_type_delete",

"work_location_create",
"work_location_update",
"work_location_view",
"work_location_delete",

"recruitment_process_create",
"recruitment_process_update",
"recruitment_process_view",
"recruitment_process_delete",


"employment_status_create",
"employment_status_update",
"employment_status_view",
"employment_status_delete",

"setting_leave_type_create",
"setting_leave_type_update",
"setting_leave_type_view",
"setting_leave_type_delete",

"setting_leave_create",

"setting_attendance_create",

"setting_payroll_create",


"business_times_update",
       "business_times_view",

            ],
        ],

        [
            "role" => "reseller",
            "permissions" => [

                "role_view",



                "user_create",
                "user_update",
                "user_view",
                "user_delete",

                "designation_create",
                "designation_update",
                "designation_view",
                "designation_delete",

                "job_type_create",
"job_type_update",
"job_type_view",
"job_type_delete",

"work_location_create",
"work_location_update",
"work_location_view",
"work_location_delete",

"recruitment_process_create",
"recruitment_process_update",
"recruitment_process_view",
"recruitment_process_delete",

                "business_create",
                "business_update",
                "business_view",
                "business_delete",


            "job_platform_create",
            "job_platform_update",
            "job_platform_view",
            "job_platform_delete",


"social_site_create",
"social_site_update",
"social_site_view",
"social_site_delete",


"setting_leave_create",

"setting_attendance_create",

"setting_payroll_create",


"business_times_update",
       "business_times_view",


            ],
        ],

        [
            "role" => "business_owner",
            "permissions" => [


                "user_create",
                "user_update",
                "user_view",
                "user_delete",

                "employee_document_create",
                "employee_document_update",
                "employee_document_view",
                "employee_document_delete",

                "employee_job_history_create",
                "employee_job_history_update",
                "employee_job_history_view",
                "employee_job_history_delete",

                "employee_education_history_create",
                "employee_education_history_update",
                "employee_education_history_view",
                "employee_education_history_delete",

                "employee_address_history_create",
                "employee_address_history_update",
                "employee_address_history_view",
                "employee_address_history_delete",

                "employee_sponsorship_history_create",
                "employee_sponsorship_history_update",
                "employee_sponsorship_history_view",
                "employee_sponsorship_history_delete",



                "employee_asset_create",
                "employee_asset_update",
                "employee_asset_view",
                "employee_asset_delete",

                "employee_social_site_create",
                "employee_social_site_update",
                "employee_social_site_view",
                "employee_social_site_delete",

                "role_create",
                "role_update",
                "role_view",
                "role_delete",

                "business_update",
                "business_view",
                "product_category_view",
                "global_business_background_image_view",



                "department_create",
                "department_update",
                "department_view",
                "department_delete",


                "asset_type_create",
                "asset_type_update",
                "asset_type_view",
                "asset_type_delete",

                "job_listing_create",
                "job_listing_update",
                "job_listing_view",
                "job_listing_delete",

// "job_platform_create",
"job_platform_update",
"job_platform_view",
// "job_platform_delete",

                "project_create",
                "project_update",
                "project_view",
                "project_delete",

                "task_create",
                "task_update",
                "task_view",
                "task_delete",

                "holiday_create",
                "holiday_update",
                "holiday_view",
                "holiday_delete",

                "work_shift_create",
                "work_shift_update",
                "work_shift_view",
                "work_shift_delete",

                "announcement_create",
                "announcement_update",
                "announcement_view",
                "announcement_delete",






                "designation_create",
                "designation_update",
                "designation_view",
                "designation_delete",

                "job_type_create",
"job_type_update",
"job_type_view",
"job_type_delete",

"work_location_create",
"work_location_update",
"work_location_view",
"work_location_delete",

"recruitment_process_create",
"recruitment_process_update",
"recruitment_process_view",
"recruitment_process_delete",




                "employment_status_create",
                "employment_status_update",
                "employment_status_view",
                "employment_status_delete",

                "setting_leave_type_create",
                "setting_leave_type_update",
                "setting_leave_type_view",
                "setting_leave_type_delete",
                "setting_leave_create",



                "leave_create",
                "leave_approve",
                "leave_update",
                "leave_view",
                "leave_delete",

                "candidate_create",
                "candidate_update",
                "candidate_view",
                "candidate_delete",




                "setting_attendance_create",

"attendance_create",
"attendance_approve",
"attendance_update",
"attendance_view",
"attendance_delete",


"setting_payroll_create",

"business_times_update",
       "business_times_view",
            ],
        ],

        [
            "role" => "business_admin",
            "permissions" => [


                "user_create",
                "user_update",
                "user_view",
                "user_delete",

                "employee_document_create",
                "employee_document_update",
                "employee_document_view",
                "employee_document_delete",

                "employee_job_history_create",
                "employee_job_history_update",
                "employee_job_history_view",
                "employee_job_history_delete",

                "employee_education_history_create",
                "employee_education_history_update",
                "employee_education_history_view",
                "employee_education_history_delete",

                "employee_address_history_create",
                "employee_address_history_update",
                "employee_address_history_view",
                "employee_address_history_delete",

                "employee_sponsorship_history_create",
                "employee_sponsorship_history_update",
                "employee_sponsorship_history_view",
                "employee_sponsorship_history_delete",


                "employee_asset_create",
                "employee_asset_update",
                "employee_asset_view",
                "employee_asset_delete",

                "employee_social_site_create",
                "employee_social_site_update",
                "employee_social_site_view",
                "employee_social_site_delete",

                "role_create",
                "role_update",
                "role_view",
                "role_delete",

                "business_update",
                "business_view",
                "product_category_view",
                "global_business_background_image_view",



                "department_create",
                "department_update",
                "department_view",
                "department_delete",

                "asset_type_create",
                "asset_type_update",
                "asset_type_view",
                "asset_type_delete",

                "job_listing_create",
                "job_listing_update",
                "job_listing_view",
                "job_listing_delete",

                // "job_platform_create",
                "job_platform_update",
                "job_platform_view",
                // "job_platform_delete",

                "project_create",
                "project_update",
                "project_view",
                "project_delete",

                "task_create",
                "task_update",
                "task_view",
                "task_delete",

                "holiday_create",
                "holiday_update",
                "holiday_view",
                "holiday_delete",

                "work_shift_create",
                "work_shift_update",
                "work_shift_view",
                "work_shift_delete",

                "announcement_create",
                "announcement_update",
                "announcement_view",
                "announcement_delete",



                "designation_create",
                "designation_update",
                "designation_view",
                "designation_delete",

                "job_type_create",
"job_type_update",
"job_type_view",
"job_type_delete",

"work_location_create",
"work_location_update",
"work_location_view",
"work_location_delete",

"recruitment_process_create",
"recruitment_process_update",
"recruitment_process_view",
"recruitment_process_delete",

                "employment_status_create",
                "employment_status_update",
                "employment_status_view",
                "employment_status_delete",

"setting_leave_type_create",
"setting_leave_type_update",
"setting_leave_type_view",
"setting_leave_type_delete",
"setting_leave_create",



"leave_create",
"leave_update",
"leave_approve",
"leave_view",
"leave_delete",

"candidate_create",
"candidate_update",
"candidate_view",
"candidate_delete",



"setting_attendance_create",

"attendance_create",
"attendance_approve",
"attendance_update",
"attendance_view",
"attendance_delete",

"setting_payroll_create",


            ],
        ],
        [
            "role" => "business_manager",
            "permissions" => [


                "user_create",
                "user_update",
                "user_view",
                "user_delete",

                "employee_document_create",
                "employee_document_update",
                "employee_document_view",
                "employee_document_delete",

                "employee_job_history_create",
                "employee_job_history_update",
                "employee_job_history_view",
                "employee_job_history_delete",

                "employee_education_history_create",
                "employee_education_history_update",
                "employee_education_history_view",
                "employee_education_history_delete",

                "employee_address_history_create",
                "employee_address_history_update",
                "employee_address_history_view",
                "employee_address_history_delete",

                "employee_sponsorship_history_create",
                "employee_sponsorship_history_update",
                "employee_sponsorship_history_view",
                "employee_sponsorship_history_delete",


                "employee_asset_create",
                "employee_asset_update",
                "employee_asset_view",
                "employee_asset_delete",

                "employee_social_site_create",
                "employee_social_site_update",
                "employee_social_site_view",
                "employee_social_site_delete",

                "role_create",
                "role_update",
                "role_view",
                "role_delete",

                "business_update",
                "business_view",
                "product_category_view",
                "global_business_background_image_view",



                "department_create",
                "department_update",
                "department_view",
                "department_delete",

                "asset_type_create",
                "asset_type_update",
                "asset_type_view",
                "asset_type_delete",

                "job_listing_create",
                "job_listing_update",
                "job_listing_view",
                "job_listing_delete",

                // "job_platform_create",
                "job_platform_update",
                "job_platform_view",
                // "job_platform_delete",

                "project_create",
                "project_update",
                "project_view",
                "project_delete",

                "task_create",
                "task_update",
                "task_view",
                "task_delete",

                "holiday_create",
                "holiday_update",
                "holiday_view",
                "holiday_delete",

                "work_shift_create",
                "work_shift_update",
                "work_shift_view",
                "work_shift_delete",

                "announcement_create",
                "announcement_update",
                "announcement_view",
                "announcement_delete",



                "designation_create",
                "designation_update",
                "designation_view",
                "designation_delete",

                "job_type_create",
"job_type_update",
"job_type_view",
"job_type_delete",

"work_location_create",
"work_location_update",
"work_location_view",
"work_location_delete",

"recruitment_process_create",
"recruitment_process_update",
"recruitment_process_view",
"recruitment_process_delete",

                "employment_status_create",
                "employment_status_update",
                "employment_status_view",
                "employment_status_delete",

"setting_leave_type_create",
"setting_leave_type_update",
"setting_leave_type_view",
"setting_leave_type_delete",
"setting_leave_create",



"leave_create",
"leave_update",
"leave_approve",
"leave_view",
"leave_delete",

"candidate_create",
"candidate_update",
"candidate_view",
"candidate_delete",



"setting_attendance_create",

"attendance_create",
"attendance_update",
"attendance_approve",
"attendance_view",
"attendance_delete",

"setting_payroll_create",


            ],
        ],

        [
            "role" => "business_employee",
            "permissions" => [




            ],
        ],


    ],
    "roles" => [
        "superadmin",
        'reseller',
        "business_owner",
        "business_admin",
        "business_manager",
        "business_employee",

    ],
    "permissions" => [
        "global_business_background_image_create",
        "global_business_background_image_view",

        "module_update",
        "module_view",


        "business_tier_create",
        "business_tier_update",
        "business_tier_view",
        "business_tier_delete",

       "user_create",
       "user_update",
       "user_view",
       "user_delete",

       "employee_document_create",
       "employee_document_update",
       "employee_document_view",
       "employee_document_delete",

       "employee_job_history_create",
       "employee_job_history_update",
       "employee_job_history_view",
       "employee_job_history_delete",

       "employee_education_history_create",
       "employee_education_history_update",
       "employee_education_history_view",
       "employee_education_history_delete",

       "employee_address_history_create",
       "employee_address_history_update",
       "employee_address_history_view",
       "employee_address_history_delete",

       "employee_sponsorship_history_create",
       "employee_sponsorship_history_update",
       "employee_sponsorship_history_view",
       "employee_sponsorship_history_delete",


       "employee_asset_create",
       "employee_asset_update",
       "employee_asset_view",
       "employee_asset_delete",

       "employee_social_site_create",
       "employee_social_site_update",
       "employee_social_site_view",
       "employee_social_site_delete",


       "role_create",
       "role_update",
       "role_view",
       "role_delete",

       "business_create",
       "business_update",
       "business_view",
       "business_delete",


       "template_create",
       "template_update",
       "template_view",
       "template_delete",



       "payment_type_create",
       "payment_type_update",
       "payment_type_view",
       "payment_type_delete",


       "product_category_create",
       "product_category_update",
       "product_category_view",
       "product_category_delete",

       "product_create",
       "product_update",
       "product_view",
       "product_delete",


       "department_create",
       "department_update",
       "department_view",
       "department_delete",

       "asset_type_create",
       "asset_type_update",
       "asset_type_view",
       "asset_type_delete",

       "job_listing_create",
       "job_listing_update",
       "job_listing_view",
       "job_listing_delete",

"job_platform_create",
"job_platform_update",
"job_platform_view",
"job_platform_delete",


       "project_create",
       "project_update",
       "project_view",
       "project_delete",

       "task_create",
       "task_update",
       "task_view",
       "task_delete",

       "holiday_create",
       "holiday_update",
       "holiday_view",
       "holiday_delete",

       "work_shift_create",
       "work_shift_update",
       "work_shift_view",
       "work_shift_delete",


       "announcement_create",
       "announcement_update",
       "announcement_view",
       "announcement_delete",




       "social_site_create",
"social_site_update",
"social_site_view",
"social_site_delete",



       "designation_create",
       "designation_update",
       "designation_view",
       "designation_delete",

       "job_type_create",
"job_type_update",
"job_type_view",
"job_type_delete",

"work_location_create",
"work_location_update",
"work_location_view",
"work_location_delete",

"recruitment_process_create",
"recruitment_process_update",
"recruitment_process_view",
"recruitment_process_delete",



       "employment_status_create",
       "employment_status_update",
       "employment_status_view",
       "employment_status_delete",

       "setting_leave_type_create",
"setting_leave_type_update",
"setting_leave_type_view",
"setting_leave_type_delete",
"setting_leave_create",



"leave_create",
"leave_update",
"leave_approve",
"leave_view",
"leave_delete",

"candidate_create",
"candidate_update",
"candidate_view",
"candidate_delete",


"setting_attendance_create",

"attendance_create",
"attendance_update",
"attendance_approve",
"attendance_view",
"attendance_delete",

"setting_payroll_create",

"business_times_update",
       "business_times_view",

    ],
    "permissions_titles" => [
        "global_business_background_image_create" => "Can create global business background image",
        "global_business_background_image_view" => "Can view global business background image",


        "module_update" => "Can enable module",
        "module_view" => "Can view module",


        "business_tier_create" => "Can create business tier",
        "business_tier_update" => "Can update business tier" ,
        "business_tier_view" => "Can view business tier",
        "business_tier_delete" => "Can delete business tier",


        "user_create" => "Can create user",
        "user_update" => "Can update user",
        "user_view" => "Can view user",
        "user_delete" => "Can delete user",

        "employee_document_create" => "",
        "employee_document_update" => "",
        "employee_document_view" => "",
        "employee_document_delete" => "",

        "employee_job_history_create" => "",
        "employee_job_history_update" => "",
        "employee_job_history_view" => "",
        "employee_job_history_delete" => "",

        "employee_education_history_create" => "",
        "employee_education_history_update" => "",
        "employee_education_history_view" => "",
        "employee_education_history_delete" => "",

        "employee_address_history_create" => "",
        "employee_address_history_update" => "",
        "employee_address_history_view" => "",
        "employee_address_history_delete" => "",

        "employee_sponsorship_history_create",
        "employee_sponsorship_history_update",
        "employee_sponsorship_history_view",
        "employee_sponsorship_history_delete",




        "employee_asset_create" => "",
        "employee_asset_update" => "",
        "employee_asset_view" => "",
        "employee_asset_delete" => "",

        "employee_social_site_create" => "",
        "employee_social_site_update" => "",
        "employee_social_site_view" => "",
        "employee_social_site_delete" => "",



        "role_create" => "Can create role",
        "role_update" => "Can update role",
        "role_view" => "Can view role",
        "role_delete" => "Can delete role",

        "business_create" => "Can create business",
        "business_update" => "Can update business",
        "business_view" => "Can view business",
        "business_delete" => "Can delete business",

        "template_create" => "Can create template",
        "template_update" => "Can update template",
        "template_view" => "Can view template",
        "template_delete" => "Can delete template",

        "payment_type_create" => "Can create payment type",
        "payment_type_update" => "Can update payment type",
        "payment_type_view" => "Can view payment type",
        "payment_type_delete" => "Can delete payment type",

        "product_category_create" => "Can create product category",
        "product_category_update" => "Can update product category",
        "product_category_view" => "Can view product category",
        "product_category_delete" => "Can delete product category",

        "product_create" => "Can create product",
        "product_update" => "Can update product",
        "product_view" => "Can view product",
        "product_delete" => "Can delete product",

        "department_create" => "Can create department",
        "department_update" => "Can update department",
        "department_view" => "Can view department",
        "department_delete" => "Can delete department",

        "asset_type_create" => "",
        "asset_type_update" => "",
        "asset_type_view" => "",
        "asset_type_delete" => "",

        "job_listing_create" => "Can create job listing",
        "job_listing_update" => "Can update job listing",
        "job_listing_view" => "Can view job listing",
        "job_listing_delete" => "Can delete job listing",

        "project_create" => "Can create project",
        "project_update" => "Can update project",
        "project_view" => "Can view project",
        "project_delete" => "Can delete project",

        "task_create" => "Can create task",
        "task_update" => "Can update task",
        "task_view" => "Can view task",
        "task_delete" => "Can delete task",





        "holiday_create" => "Can create holiday",
        "holiday_update" => "Can update holiday",
        "holiday_view" => "Can view holiday",
        "holiday_delete" => "Can delete holiday",

        "work_shift_create" => "Can create work shift",
        "work_shift_update" => "Can update work shift",
        "work_shift_view" => "Can view work shift",
        "work_shift_delete" => "Can delete work shift",

        "announcement_create" => "Can create announcement",
        "announcement_update" => "Can update announcement",
        "announcement_view" => "Can view announcement",
        "announcement_delete" => "Can delete announcement",




        "job_platform_create" => "Can create job platform",
        "job_platform_update" => "Can update job platform",
        "job_platform_view" => "Can view job platform",
        "job_platform_delete" => "Can delete job platform",

        "social_site_create" => "Can create social site",
"social_site_update"  => "Can update social site",
"social_site_view" => "Can view social site",
"social_site_delete" => "Can delete social site",



        "designation_create" => "Can create designation",
        "designation_update" => "Can update designation",
        "designation_view" => "Can view designation",
        "designation_delete" => "Can delete designation",

        "job_type_create" => "",
"job_type_update" => "",
"job_type_view" => "",
"job_type_delete" => "",

"work_location_create" => "",
"work_location_update" => "",
"work_location_view" => "",
"work_location_delete" => "",

"recruitment_process_create" => "",
"recruitment_process_update" => "",
"recruitment_process_view" => "",
"recruitment_process_delete" => "",

        "employment_status_create" => "Can create employment status",
        "employment_status_update" => "Can update employment status",
        "employment_status_view" => "Can view employment status",
        "employment_status_delete" => "Can delete employment status",

        "setting_leave_type_create" => "Can create setting leave type",
        "setting_leave_type_update" => "Can update setting leave type",
        "setting_leave_type_view" => "Can view setting leave type",
        "setting_leave_type_delete" => "Can delete setting leave type",
        "setting_leave_create" => "Can create setting leave",




        "leave_create" => "Can create leave",
        "leave_update" => "Can update leave",
        "leave_approve" => "Can approve leave",

        "leave_view" => "Can view leave",
        "leave_delete" => "Can delete leave",


        "candidate_create" => "Can create candidate",
        "candidate_update" => "Can update candidate",
        "candidate_view" => "Can view candidate",
        "candidate_delete" => "Can delete candidate",




        "setting_attendance_create" => "Can create setting attendance",


        "attendance_create" => "Can create attendance",
        "attendance_update" => "Can update attendance",
        "attendance_approve" => "",
        "attendance_view" => "Can view attendance",
        "attendance_delete" => "Can delete attendance",


        "setting_payroll_create" => "Can create setting payroll",





    ],
    "unchangeable_roles" => [
        // "superadmin",
        // "reseller"
    ],
    "unchangeable_permissions" => [
        // "business_update",
        // "business_view",
    ],

    "beautified_permissions_titles" => [
        "global_business_background_image_create" => "create",
        "global_business_background_image_view" => "view",

        "module_update" => "enable",
        "module_view" => "view",


        "user_create" => "create",
        "user_update" => "update",
        "user_view" => "view",
        "user_delete" => "delete",


        "business_tier_create" => "create",
        "business_tier_update" => "update",
        "business_tier_view" => "view",
        "business_tier_delete" => "delete",

        "employee_document_create" => "create",
        "employee_document_update"  => "update",
        "employee_document_view"  => "view",
        "employee_document_delete"  => "delete",

        "employee_job_history_create" => "create",
        "employee_job_history_update"  => "update",
        "employee_job_history_view"  => "view",
        "employee_job_history_delete"  => "delete",


        "employee_education_history_create" => "create",
        "employee_education_history_update"  => "update",
        "employee_education_history_view"  => "view",
        "employee_education_history_delete"  => "delete",

        "employee_address_history_create" => "create",
        "employee_address_history_update"  => "update",
        "employee_address_history_view"  => "view",
        "employee_address_history_delete"  => "delete",


        "employee_sponsorship_history_create" => "create",
        "employee_sponsorship_history_update" => "update",
        "employee_sponsorship_history_view" => "view",
        "employee_sponsorship_history_delete" => "delete",









        "employee_asset_create" => "create",
        "employee_asset_update" => "update",
        "employee_asset_view" => "view",
        "employee_asset_delete" => "delete",


        "employee_social_site_create" => "create",
        "employee_social_site_update" => "update",
        "employee_social_site_view" => "view",
        "employee_social_site_delete" => "delete",




        "role_create" => "create",
        "role_update" => "update",
        "role_view" => "view",
        "role_delete" => "delete",

        "business_create" => "create",
        "business_update" => "update",
        "business_view" => "view",
        "business_delete" => "delete",

        "template_create" => "create",
        "template_update" => "update",
        "template_view" => "view",
        "template_delete" => "delete",

        "payment_type_create" => "create",
        "payment_type_update" => "update",
        "payment_type_view" => "view",
        "payment_type_delete" => "delete",

        "product_category_create" => "create",
        "product_category_update" => "update",
        "product_category_view" => "view",
        "product_category_delete" => "delete",

        "product_create" => "create",
        "product_update" => "update",
        "product_view" => "view",
        "product_delete" => "delete",

        "department_create" => "create",
        "department_update" => "update",
        "department_view" => "view",
        "department_delete" => "delete",

        "asset_type_create" => "create",
        "asset_type_update" => "update",
        "asset_type_view" => "view",
        "asset_type_delete" => "delete",


        "job_listing_create" => "create",
        "job_listing_update" => "update",
        "job_listing_view" => "view",
        "job_listing_delete" => "delete",

        "project_create" => "create",
        "project_update" => "update",
        "project_view" => "view",
        "project_delete" => "delete",

        "task_create" => "create",
        "task_update" => "update",
        "task_view" => "view",
        "task_delete" => "delete",





        "holiday_create" => "create",
        "holiday_update" => "update",
        "holiday_view" => "view",
        "holiday_delete" => "delete",

        "work_shift_create" => "create",
        "work_shift_update" => "update",
        "work_shift_view" => "view",
        "work_shift_delete" => "delete",

        "announcement_create" => "create",
        "announcement_update" => "update",
        "announcement_view" => "view",
        "announcement_delete" => "delete",




        "job_platform_create" => "create",
        "job_platform_update" => "update",
        "job_platform_view" => "view",
        "job_platform_delete" => "delete",

        "social_site_create" => "create",
        "social_site_update" => "update",
        "social_site_view" => "view",
        "social_site_delete" => "delete",


        "designation_create" => "create",
        "designation_update" => "update",
        "designation_view" => "view",
        "designation_delete" => "delete",

        "job_type_create" => "create",
        "job_type_update" => "update",
        "job_type_view" => "view",
        "job_type_delete" => "delete",


        "work_location_create" => "create",
        "work_location_update" => "update",
        "work_location_view" => "view",
        "work_location_delete" => "delete",

        "recruitment_process_create" => "create",
"recruitment_process_update" => "update",
"recruitment_process_view" => "view",
"recruitment_process_delete" => "delete",



        "employment_status_create" => "create",
        "employment_status_update" => "update",
        "employment_status_view" => "view",
        "employment_status_delete" => "delete",

        "setting_leave_type_create" => "create",
        "setting_leave_type_update" => "update",
        "setting_leave_type_view" => "view",
        "setting_leave_type_delete" => "delete",

        "setting_leave_create" => "create",




        "leave_create" => "create",
        "leave_update" => "update",
        "leave_approve" => "approve",

        "leave_view" => "view",
        "leave_delete" => "delete",


        "candidate_create" => "create",
        "candidate_update" => "update",
        "attendance_approve" => "approve",
        "candidate_view" => "view",
        "candidate_delete" => "delete",




        "setting_attendance_create" => "create",


        "attendance_create" => "create",
        "attendance_update" => "update",
        "attendance_view" => "view",
        "attendance_delete" => "delete",


        "setting_payroll_create" => "create",





    ],

    "beautified_permissions" => [
        [
            "header" => "global_business_background_image",
            "permissions" => [
                "global_business_background_image_create",
                "global_business_background_image_view",
            ],
        ],


        [
            "header" => "module",
            "permissions" => [
       "module_update",
       "module_view",

            ],
        ],

        [
            "header" => "business_tier",
            "permissions" => [
                "business_tier_create",
                "business_tier_update",
                "business_tier_view",
                "business_tier_delete",
            ],

        ],



        [
            "header" => "user",
            "permissions" => [
       "user_create",
       "user_update",
       "user_view",
       "user_delete",

            ],
        ],

        [
            "header" => "employee_document",
            "permissions" => [
                "employee_document_create",
                "employee_document_update",
                "employee_document_view",
                "employee_document_delete",



            ],
        ],

        [
            "header" => "employee_job_history",
            "permissions" => [
                "employee_job_history_create",
                "employee_job_history_update",
                "employee_job_history_view",
                "employee_job_history_delete",



            ],
        ],

        [
            "header" => "employee_education_history",
            "permissions" => [
                "employee_education_history_create",
                "employee_education_history_update",
                "employee_education_history_view",
                "employee_education_history_delete",



            ],
        ],

        [
            "header" => "employee_address_history",
            "permissions" => [
                "employee_address_history_create",
                "employee_address_history_update",
                "employee_address_history_view",
                "employee_address_history_delete",

            ],
        ],

        [
            "header" => "employee_sponsorship_history",
            "permissions" => [

       "employee_sponsorship_history_create",
       "employee_sponsorship_history_update",
       "employee_sponsorship_history_view",
       "employee_sponsorship_history_delete",


            ],
        ],





        [
            "header" => "employee_asset",
            "permissions" => [
                "employee_asset_create",
                "employee_asset_update",
                "employee_asset_view",
                "employee_asset_delete",


            ],
        ],



        [
            "header" => "employee_social_site",
            "permissions" => [
                "employee_social_site_create",
        "employee_social_site_update",
        "employee_social_site_view",
        "employee_social_site_delete",

            ],
        ],




        [
            "header" => "role",
            "permissions" => [
                "role_create",
                "role_update",
                "role_view",
                "role_delete",

            ],
        ],

        [
            "header" => "business",
            "permissions" => [
                "business_create",
                "business_update",
                "business_view",
                "business_delete",

            ],
        ],


        [
            "header" => "template",
            "permissions" => [
                "template_create",
                "template_update",
                "template_view",
                "template_delete",



            ],
        ],


        [
            "header" => "payment_type",
            "permissions" => [
                "payment_type_create",
                "payment_type_update",
                "payment_type_view",
                "payment_type_delete",


            ],
        ],

        [
            "header" => "product_category",
            "permissions" => [
                "product_category_create",
                "product_category_update",
                "product_category_view",
                "product_category_delete",


            ],
        ],

        [
            "header" => "product",
            "permissions" => [
                "product_create",
                "product_update",
                "product_view",
                "product_delete",



            ],
        ],


        [
            "header" => "department",
            "permissions" => [
                "department_create",
                "department_update",
                "department_view",
                "department_delete",
            ],
        ],
        [
            "header" => "asset_type",
            "permissions" => [
                "asset_type_create",
                "asset_type_update",
                "asset_type_view",
                "asset_type_delete",
            ],
        ],





        [
            "header" => "job_listing",
            "permissions" => [
                "job_listing_create",
                "job_listing_update",
                "job_listing_view",
                "job_listing_delete",



            ],
        ],

        [
            "header" => "project",
            "permissions" => [

                "project_create",
                "project_update",
                "project_view",
                "project_delete",


            ],
        ],


        [
            "header" => "task",
            "permissions" => [
                "task_create",
       "task_update",
       "task_view",
       "task_delete",




            ],
        ],


        [
            "header" => "holiday",
            "permissions" => [
                "holiday_create",
       "holiday_update",
       "holiday_view",
       "holiday_delete",




            ],
        ],

        [
            "header" => "work_shift",
            "permissions" => [
                "work_shift_create",
                "work_shift_update",
                "work_shift_view",
                "work_shift_delete",



            ],
        ],



        [
            "header" => "announcement",
            "permissions" => [
                "announcement_create",
                "announcement_update",
                "announcement_view",
                "announcement_delete",



            ],
        ],







        [
            "header" => "job_platform",
            "permissions" => [

       "job_platform_create",
       "job_platform_update",
       "job_platform_view",
       "job_platform_delete",




            ],
        ],

        [
            "header" => "social_site",
            "permissions" => [

                "social_site_create",
                "social_site_update",
                "social_site_view",
                "social_site_delete",



            ],
        ],





        [
            "header" => "designation",
            "permissions" => [
                "designation_create",
                "designation_update",
                "designation_view",
                "designation_delete",
            ],
        ],

        [
            "header" => "job_type",
            "permissions" => [
                "job_type_create",
                "job_type_update",
                "job_type_view",
                "job_type_delete",
            ],
        ],

        [
            "header" => "work_location",
            "permissions" => [
                "work_location_create",
                "work_location_update",
                "work_location_view",
                "work_location_delete",
            ],
        ],

        [
            "header" => "recruitment_process",
            "permissions" => [
                "recruitment_process_create",
                "recruitment_process_update",
                "recruitment_process_view",
                "recruitment_process_delete",
            ],
        ],







        [
            "header" => "employment_status",
            "permissions" => [
                "employment_status_create",
                "employment_status_update",
                "employment_status_view",
                "employment_status_delete",





            ],
        ],
        [
            "header" => "setting_leave_type",
            "permissions" => [
                "setting_leave_type_create",
                "setting_leave_type_update",
                "setting_leave_type_view",
                "setting_leave_type_delete",






            ],
        ],
        [
            "header" => "setting_leave",
            "permissions" => [

                "setting_leave_create",





            ],
        ],

        [
            "header" => "leave",
            "permissions" => [

                "leave_create",
                "leave_update",
                "leave_approve",
                "leave_view",
                "leave_delete",





            ],
        ],

        [
            "header" => "candidate",
            "permissions" => [

                "candidate_create",
                "candidate_update",
                "candidate_view",
                "candidate_delete",





            ],
        ],



        [
            "header" => "setting_attendance",
            "permissions" => [

                "setting_attendance_create",




            ],
        ],

        [
            "header" => "attendance",
            "permissions" => [

                "attendance_create",
                "attendance_update",
                "attendance_approve",
                "attendance_view",
                "attendance_delete",




            ],
        ],

        [
            "header" => "setting_payroll",
            "permissions" => [

                "setting_payroll_create",



            ],
        ],






    ],




    "user_image_location" => "user_image",

    "user_files_location" => "user_files",

    "user_assets_location" => "user_assets",

    "leave_files_location" => "leave_files",

    "candidate_files_location" => "candidate_files",

    "payslip_logo_location" => "payslip_logo",






    "business_gallery_location" => "business_gallery",
    "business_background_image_location" => "business_background_image",
    "business_background_image_location_full" => "business_background_image/business_background_image.jpeg",

    "temporary_files_location" => "temporary_files",
];
