<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\AboutUs\Database\Seeders\AboutUsSeeder;
use Modules\Accountant\Database\Seeders\AccountantDatabaseSeeder;
use Modules\AccountantOffer\Database\Seeders\AccountantOfferDatabaseSeeder;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Ads\Database\Seeders\AdsDatabaseSeeder;
use Modules\Auth\Database\Seeders\AccountantSeeder;
use Modules\Auth\Database\Seeders\AuthDatabaseSeeder;
use Modules\Auth\Database\Seeders\CertifiedSeeder;
use Modules\Auth\Database\Seeders\CompanySeeder;
use Modules\Auth\Database\Seeders\InstructorSeeder;
use Modules\Auth\Database\Seeders\InterviewerSeeder;
use Modules\Auth\Database\Seeders\NormalUserSeeder;
use Modules\Author\Database\Seeders\AuthorDatabaseSeeder;
use Modules\BecomeCompany\Database\Seeders\BecomeCompanyDatabaseSeeder;
use Modules\Blogs\Database\Seeders\BlogsDatabaseSeeder;
use Modules\BuyCoins\Database\Seeders\CoinsDatabaseSeeder;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;
use Modules\Color\Database\Seeders\ColorDatabaseSeeder;
use Modules\Comments\Database\Seeders\CommentsDatabaseSeeder;
use Modules\Company\Database\Seeders\CompanyDatabaseSeeder;
use Modules\ConditionAndPrivacy\Database\Seeders\ConditionAndPrivacyDatabaseSeeder;
use Modules\ContactUs\Database\Seeders\ContactUsDatabaseSeeder;
use Modules\Course\Database\Seeders\CourseDatabaseSeeder;
use Modules\Faqs\Database\Seeders\FaqsDatabaseSeeder;
use Modules\Instructor\Database\Seeders\ExperienceDatabaseSeeder;
use Modules\Instructor\Database\Seeders\InstructorDatabaseSeeder;
use Modules\Interviewerr\Database\Seeders\AvailabilityDatabaseSeeder;
use Modules\Interviewerr\Database\Seeders\InterviewerrDatabaseSeeder;
use Modules\JobOffer\Database\Seeders\JobOfferDatabaseSeeder;
use Modules\OurTeam\Database\Seeders\OurTeamDatabaseSeeder;
use Modules\Padge\Database\Seeders\PadgeDatabaseSeeder;
use Modules\Permission\Database\Seeders\PermissionDatabaseSeeder;
use Modules\Position\Database\Seeders\PositionDatabaseSeeder;
use Modules\Reviews\Database\Seeders\ReviewsDatabaseSeeder;
use Modules\SendOffer\Database\Seeders\SendOfferDatabaseSeeder;
use Modules\Service\Database\Seeders\ServiceDatabaseSeeder;
use Modules\Setting\Database\Seeders\SettingDatabaseSeeder;
use Modules\SubCategory\Database\Seeders\SubCategoryDatabaseSeeder;
use Modules\Videos\Database\Seeders\VideosDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionDatabaseSeeder::class,
            AuthDatabaseSeeder::class,
            ContactUsDatabaseSeeder::class,
            PositionDatabaseSeeder::class,
            SettingDatabaseSeeder::class,
            ColorDatabaseSeeder::class,
            ConditionAndPrivacyDatabaseSeeder::class,
            PadgeDatabaseSeeder::class,
            ServiceDatabaseSeeder::class,
            OurTeamDatabaseSeeder::class,
            CategoryDatabaseSeeder::class,
            SubCategoryDatabaseSeeder::class,
            InstructorDatabaseSeeder::class,
            CourseDatabaseSeeder::class,
            CoinsDatabaseSeeder::class,
            AboutUsSeeder::class,
            AuthorDatabaseSeeder::class,
            CategoryDatabaseSeeder::class,
            SubCategoryDatabaseSeeder::class,
            BlogsDatabaseSeeder::class,
            CommentsDatabaseSeeder::class,
            AdsDatabaseSeeder::class,
            FaqsDatabaseSeeder::class,

//            AccountantDatabaseSeeder::class,
//            CompanyDatabaseSeeder::class,
            JobOfferDatabaseSeeder::class,
            VideosDatabaseSeeder::class,
//            InterviewerrDatabaseSeeder::class,
            AccountantOfferDatabaseSeeder::class,
//            BecomeCompanyDatabaseSeeder::class,
            SendOfferDatabaseSeeder::class,
            ExperienceDatabaseSeeder::class,
            AvailabilityDatabaseSeeder::class,
            ReviewsDatabaseSeeder::class,
        ]);
    }
}
