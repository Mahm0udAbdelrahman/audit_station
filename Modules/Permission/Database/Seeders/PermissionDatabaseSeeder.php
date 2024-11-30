<?php

namespace Modules\Permission\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [

            // role permissions screen payment
            'view_all_payment',
            'create_payment',
            'update_payment',
            'view_payment',
            'delete_payment',
//==========================================
 // role permissions screen accountant
            'view_all_accountant',
            'create_accountant',
            'update_accountant',
            'view_accountant',
            'delete_accountant',
            //==========================================
           // role permissions screen Job Offer
            'view_all_Job_Offer',
            'create_Job_Offer',
            'update_Job_Offer',
            'view_Job_Offer',
            'delete_Job_Offer',

            //==========================================
            // role permissions screen General Questions
            'view_all_general_questions',
            'create_general_questions',
            'update_general_questions',
            'view_general_questions',
            'delete_general_questions',

            //==========================================
            // role permissions screen Specialization Questions
            'view_all_Specialization_Questions',
            'create_Specialization_Questions',
            'update_Specialization_Questions',
            'view_Specialization_Questions',
            'delete_Specialization_Questions',

            //==========================================
            // role permissions screen Exams
            'view_all_Exams',
            'create_Exams',
            'update_Exams',
            'view_Exams',
            'delete_Exams',

            //==========================================
            // role permissions screen Accreditation management
            'view_all_Accreditation_management',
            'create_Accreditation_management',
            'update_Accreditation_management',
            'view_Accreditation_management',
            'delete_Accreditation_management',


            //==========================================
            // role permissions screen Certificate Design
            'view_all_Certificate_Design',
            'create_Certificate_Design',
            'update_Certificate_Design',
            'view_Certificate_Design',
            'delete_Certificate_Design',
 //==========================================
            // role permissions screen Badge Design
            'view_all_Badge_Design',
            'create_Badge_Design',
            'update_Badge_Design',
            'view_Badge_Design',
            'delete_Badge_Design',


            //==========================================
            // role permissions screen Paper Certificate
            'view_all_Paper_Certificate',
            'create_Paper_Certificate',
            'update_Paper_Certificate',
            'view_Paper_Certificate',
            'delete_Paper_Certificate',

            //==========================================
            // role permissions screen Financial operations
            'view_all_Financial_operations',
            'create_Financial_operations',
            'update_Financial_operations',
            'view_Financial_operations',
            'delete_Financial_operations',

            //==========================================
            // role permissions screen Subscriptions
            'view_all_Subscriptions',
            'create_Subscriptions',
            'update_Subscriptions',
            'view_Subscriptions',
            'delete_Subscriptions',

            //==========================================
            // role permissions screen Categories
            'view_all_Categories',
            'create_Categories',
            'update_Categories',
            'view_Categories',
            'delete_Categories',

            //==========================================
            // role permissions screen Sub Categories
            'view_all_Sub_Categories',
            'create_Sub_Categories',
            'update_Sub_Categories',
            'view_Sub_Categories',
            'delete_Sub_Categories',

            //==========================================
            // role permissions screen Sub Sub Categories
            'view_all_Sub_Sub_Categories',
            'create_Sub_Sub_Categories',
            'update_Sub_Sub_Categories',
            'view_Sub_Sub_Categories',
            'delete_Sub_Sub_Categories',

            //==========================================
            // role permissions screen Course
            'view_all_Course',
            'create_Course',
            'update_Course',
            'view_Course',
            'delete_Course',

            //==========================================
            // role permissions screen Our team
            'view_all_Our_team',
            'create_Our_team',
            'update_Our_team',
            'view_Our_team',
            'delete_Our_team',



            //==========================================
            // role permissions screen Permissions
            'view_all_Permissions',
            'create_Permissions',
            'update_Permissions',
            'view_Permissions',
            'delete_Permissions',


            //==========================================
            // role permissions screen Roles
            'view_all_Roles',
            'create_Roles',
            'update_Roles',
            'view_Roles',
            'delete_Roles',

            //==========================================
            // role permissions screen Steps To Be Unique
            'view_all_Steps_To_Be_Unique',
            'create_Steps_To_Be_Unique',
            'update_Steps_To_Be_Unique',
            'view_Steps_To_Be_Unique',
            'delete_Steps_To_Be_Unique',

            //==========================================
            // role permissions screen Statistics
            'view_all_Statistics',
            'create_Statistics',
            'update_Statistics',
            'view_Statistics',
            'delete_Statistics',

            //==========================================
            // role permissions screen Faqs
            'view_all_Faqs',
            'create_Faqs',
            'update_Faqs',
            'view_Faqs',
            'delete_Faqs',

            //==========================================
            // role permissions screen Chat support
            'view_all_Chat_support',
            'create_Chat_support',
            'update_Chat_support',
            'view_Chat_support',
            'delete_Chat_support',

            //==========================================
            // role permissions screen Contact Support
            'view_all_Contact_Support',
            'create_Contact_Support',
            'update_Contact_Support',
            'view_Contact_Support',
            'delete_Contact_Support',

            //==========================================
            // role permissions screen Privacy Policy

            'update_Privacy_Policy',
            'view_Privacy_Policy',



            //==========================================
            // role permissions screen Terms & Conditions

            'update_Terms_&_Conditions',
            'view_Terms_&_Conditions',



            //==========================================
            // role permissions screen Blogs
            'view_all_Blogs',
            'create_Blogs',
            'update_Blogs',
            'view_Blogs',
            'delete_Blogs',



            //==========================================
            // role permissions screen About Us

            'update_About_Us',
            'view_About_Us',
            'delete_About_Us',


            //==========================================
            // role permissions screen Services
            'view_all_Services',
            'create_Services',
            'update_Services',
            'view_Services',
            'delete_Services',


            //==========================================
            // role permissions screen Settings
            'view_all_Settings',
            'create_Settings',
            'update_Settings',
            'view_Settings',
            'delete_Settings',

            //==========================================
            // role permissions screen Profile

            'update_Profile',
            'view_Profile',
            'delete_Profile',

            //==========================================
            // role permissions screen Notifications
            'view_all_Notifications',
            'create_Notifications',
            'update_Notifications',
            'view_Notifications',
            'delete_Notifications',

            //==========================================
            // role permissions screen Availability
            'view_all_Availability',
            'create_Availability',
            'update_Availability',
            'view_Availability',
            'delete_Availability',

            //==========================================
            // role permissions screen Interviewes
            'view_all_Interviewes',
            'create_Interviewes',
            'update_Interviewes',
            'view_Interviewes',
            'delete_Interviewes',


            //==========================================
            // role permissions screen History
            'view_all_History',
            'create_History',
            'update_History',
            'view_History',
            'delete_History',

              //==========================================
            // role permissions screen cart
            'view_all_cart',
            'create_cart',
            'delete_cart',
            'delete_all_cart',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['guard_name' => 'web','name' => $permission]);
        }

    }
}
