<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// BLOG

Route::post('/createBlog', [BlogController::class, 'create']);

Route::get('/getAllBlogs', [BlogController::class, 'getAll']);

Route::patch('/approveBlog/{id}', [BlogController::class, 'approveBlog']);

Route::patch('/addClapToBlog/{id}', [BlogController::class, 'addClap']);

Route::get('/getBlogById/{id}', [BlogController::class, 'getById']);

Route::patch('/updateOwnBlog/{id}', [BlogController::class, 'updateOwnBlog']);

Route::patch('/updateOthersBlog/{id}', [BlogController::class, 'updateOthersBlog']);

Route::delete('/deleteOwnBlog/{id}', [BlogController::class, 'deleteOwnBlog']);

Route::delete('/deleteOthersBlog/{id}', [BlogController::class, 'deleteOthersBlog']);


// BLOG-COMMENTS

Route::post('/createComment', [BlogCommentsController::class, 'create']);

Route::get('/getAllComments/{blogId}', [BlogCommentsController::class, 'getAll']);

Route::patch('/hideOrShowComment/{commentId}', [BlogCommentsController::class, 'hideOrShow']);

Route::get('/getCommentById/{commentId}', [BlogCommentsController::class, 'getById']);

Route::patch('/editComment/{commentId}', [BlogCommentsController::class, 'update']);

Route::delete('/deleteOwnComment/{commentId}', [BlogCommentsController::class, 'deleteOwnComment']);

Route::delete('/deleteOthersComment/{commentId}', [BlogCommentsController::class, 'deleteOthersComment']);



// USER

Route::post('/createUser', [UserController::class, 'createUser']);

Route::get('/getOtherUser/{id}', [UserController::class, 'getOtherUser']);

Route::get('/getAllUsers', [UserController::class, 'getAllUsers']);

Route::get('/getOwnProfile/{id}', [UserController::class, 'getOwnProfile']);

Route::get('/confirmPassword/{id}', [UserController::class, 'confirmPassword']);

Route::patch('/changePassword/{id}', [UserController::class, 'changePassword']);

Route::patch('/editOwnProfile/{id}', [UserController::class, 'editOwnProfile']);

Route::delete('/deleteOwnProfile/{id}', [UserController::class, 'deleteOwnProfile']);

Route::patch('/approveUser/{id}', [UserController::class, 'approveUser']);

Route::patch('/makeAdminUser/{id}', [UserController::class, 'makeAdminUser']);

Route::patch('/makeFreelancer/{id}', [UserController::class, 'makeFreelancer']);

Route::patch('/makeTrader/{id}', [UserController::class, 'makeTrader']);

Route::patch('/makeBlogger/{id}', [UserController::class, 'makeBlogger']);

Route::patch('/makeModerator/{id}', [UserController::class, 'makeModerator']);

Route::patch('/verifyEmail/{id}', [UserController::class, 'verifyEmail']);


//FREELANCER OFFICE DEALINGS

Route::post('/recordFreelancerAccount', [FreelanceOfficeDealingController::class, 'store']);
Route::get('/getAllFreelancerAccounts', [FreelanceOfficeDealingController::class, 'index']);
Route::patch('/approveOrDisapproveFreelanceApplication/{id}', [FreelanceOfficeDealingController::class, 'approveOrDisapprove']);
Route::patch('/updateFreelancerAccount/{id}', [FreelanceOfficeDealingController::class, 'update']);

//BLOGGERS OFFICE DEALINGS

Route::post('/recordBloggerAccount', [BloggersOfficeDealingsController::class, 'store']);
Route::get('/getAllBloggerAccounts', [BloggersOfficeDealingsController::class, 'index']);
Route::patch('/approveOrDisapproveBloggersApplication/{id}', [BloggersOfficeDealingsController::class, 'approveOrDisapprove']);

//TRADERS OFFICE DEALINGS
Route::post('/recordTraderAccount', [TradersOfficeDealingController::class, 'store']);
Route::patch('/approveOrDisapproveTradersApplication/{id}', [TradersOfficeDealingController::class, 'approveOrDisapprove']);
Route::patch('/updateTraderAccount/{id}', [TradersOfficeDealingController::class, 'update']);
Route::get('/getAllTraderAccounts', [TradersOfficeDealingController::class, 'index']);


//FREELANCE PROJECTS

Route::post('/createProject', [FreelanceProjectsController::class, 'store']);

Route::get('/getAllProjects', [FreelanceProjectsController::class, 'index']);

Route::get('/getProjectsById/{id}', [FreelanceProjectsController::class, 'show']);

Route::patch('/updateProject/{id}', [FreelanceProjectsController::class, 'update']);

Route::delete('/deleteProject/{id}', [FreelanceProjectsController::class, 'destroy']);


//FREELANCE PROJECT PROGRESS REPORT

Route::post('/createProjectProgressReport', [FreelancerProjectProgressReportController::class, 'store']);

Route::get('/getAllProjectProgressReport', [FreelancerProjectProgressReportController::class, 'index']);

Route::get('/getProjectProgressReportById/{id}', [FreelancerProjectProgressReportController::class, 'show']);

Route::patch('/updateProjectProgressReport/{id}', [FreelancerProjectProgressReportController::class, 'update']);

Route::delete('/deleteProjectProgressReport/{id}', [FreelancerProjectProgressReportController::class, 'destroy']);



//SITE TRAFFIC

Route::post('/createSiteTraffic', [SiteTrafficController::class, 'store']);

Route::get('/getAllSiteTraffic', [SiteTrafficController::class, 'index']);

Route::get('/getSiteTrafficById/{id}', [SiteTrafficController::class, 'show']);

//Company Credits

Route::post('/createCredit', [CompanyCreditsController::class, 'store']);

Route::get('/getAllCredit', [CompanyCreditsController::class, 'index']);

Route::get('/getCreditById/{id}', [CompanyCreditsController::class, 'show']);


//Company Debits

Route::post('/createDebit', [CompanyDebitsController::class, 'store']);

Route::get('/getAllDebit', [CompanyDebitsController::class, 'index']);

Route::get('/getDebitById/{id}', [CompanyDebitsController::class, 'show']);


// PORTFOLIO

Route::post('/createPortfolioItem', [PortfolioController::class, 'store']);

Route::get('/getAllPortfolioItems', [PortfolioController::class, 'index']);

Route::get('/getPortfolioItemById/{portfolioId}', [PortfolioController::class, 'show']);

Route::patch('/updatePortfolioItem/{portfolioId}', [PortfolioController::class, 'update']);

Route::delete('/deletePortfolioItem/{portfolioId}', [PortfolioController::class, 'destroy']);


// PRODUCT

Route::post('/createProduct', [ProductController::class, 'store']);

Route::get('/getAllProducts', [ProductController::class, 'index']);

Route::get('/getProductById/{id}', [ProductController::class, 'show']);

Route::patch('/updateProduct/{id}', [ProductController::class, 'update']);

Route::delete('/deleteProduct/{id}', [ProductController::class, 'destroy']);


// MAIL

Route::post('/createMail', [MailController::class, 'store']);

Route::get('/getAllMails', [MailController::class, 'index']);

Route::get('/getMailById/{id}', [MailController::class, 'show']);

Route::patch('/updateMail/{id}', [MailController::class, 'update']);

Route::delete('/deleteMail/{id}', [MailController::class, 'destroy']);




// TASKS

Route::post('/createTask', [TaskController::class, 'store']);

Route::get('/getAllTasks', [TaskController::class, 'index']);

Route::get('/getTaskById/{taskId}', [TaskController::class, 'show']);

Route::patch('/updateTask/{taskId}', [TaskController::class, 'update']);

Route::delete('/deleteTask/{taskId}', [TaskController::class, 'destroy']);


// JOBS

Route::post('/createJob', [JobController::class, 'store']);

Route::get('/getAllJob', [JobController::class, 'index']);

Route::get('/getJobById/{jobId}', [JobController::class, 'show']);

Route::delete('/deleteJob/{jobId}', [JobController::class, 'destroy']);


// SALES

Route::post('/recordASale', [SalesController::class, 'store']);

Route::get('/getAllSales', [SalesController::class, 'index']);

Route::get('/getSalesById/{salesId}', [SalesController::class, 'show']);

Route::patch('/updateASale/{salesId}', [SalesController::class, 'update']);

Route::delete('/deleteSalesRecord/{salesId}', [SalesController::class, 'destroy']);


// BLOG CATEGORY

Route::post('/createBlogCategory', [BlogCategoryOptionsController::class, 'store']);

Route::get('/getAllBlogCategories', [BlogCategoryOptionsController::class, 'index']);

Route::get('/getBlogCategoryById/{categoryId}', [BlogCategoryOptionsController::class, 'show']);

Route::patch('/updateBlogCategory/{categoryId}', [BlogCategoryOptionsController::class, 'update']);

Route::delete('/deleteBlogCategory/{categoryId}', [BlogCategoryOptionsController::class, 'destroy']);


// Client Update Type Options

Route::post('/createClientUpdateOptionsCategory', [ClientUpdateTypeOptionsController::class, 'store']);

Route::get('/getAllClientUpdateOptionsCategories', [ClientUpdateTypeOptionsController::class, 'index']);

Route::get('/getClientUpdateOptionsCategoryById/{optionId}', [ClientUpdateTypeOptionsController::class, 'show']);

Route::patch('/updateClientUpdateOptionsCategory/{optionId}', [ClientUpdateTypeOptionsController::class, 'update']);

Route::delete('/deleteClientUpdateOptionsCategory/{optionId}', [ClientUpdateTypeOptionsController::class, 'destroy']);


// Female Dress Sizes Options 

Route::post('/createDressFemaleSizeOption', [FemaleDressSizesOptionsController::class, 'store']);

Route::get('/getAllFemaleDressSizeOption', [FemaleDressSizesOptionsController::class, 'index']);

Route::get('/getFemaleDressSizeOptionById/{optionId}', [FemaleDressSizesOptionsController::class, 'show']);

Route::patch('/updateFemaleDressSizeOption/{optionId}', [FemaleDressSizesOptionsController::class, 'update']);

Route::delete('/deleteFemaleDressSizeOption/{optionId}', [FemaleDressSizesOptionsController::class, 'destroy']);


// Female Footwear Sizes Options

Route::post('/createFemaleFootwearSizesOption', [FemaleFootwearSizesOptionsController::class, 'store']);

Route::get('/getAllFemaleFootwearSizesOption', [FemaleFootwearSizesOptionsController::class, 'index']);

Route::get('/getFemaleFootwearSizesOptionById/{optionId}', [FemaleFootwearSizesOptionsController::class, 'show']);

Route::patch('/updateFemaleFootwearSizesOption/{optionId}', [FemaleFootwearSizesOptionsController::class, 'update']);

Route::delete('/deleteFemaleFootwearSizesOption/{optionId}', [FemaleFootwearSizesOptionsController::class, 'destroy']);


// Male Dress Sizes Options

Route::post('/createMaleDressSizeOption', [MaleDressSizesOptionsController::class, 'store']);

Route::get('/getAllMaleDressSizeOption', [MaleDressSizesOptionsController::class, 'index']);

Route::get('/getMaleDressSizeOptionById/{optionId}', [MaleDressSizesOptionsController::class, 'show']);

Route::patch('/updateMaleDressSizeOption/{optionId}', [MaleDressSizesOptionsController::class, 'update']);

Route::delete('/deleteMaleDressSizeOption/{optionId}', [MaleDressSizesOptionsController::class, 'destroy']);


// Male Footwear Sizes Options

Route::post('/createMaleFootwearSizesOption', [MaleFootwearSizesOptionsController::class, 'store']);

Route::get('/getAllMaleFootwearSizesOption', [MaleFootwearSizesOptionsController::class, 'index']);

Route::get('/getMaleFootwearSizesOptionById/{optionId}', [MaleFootwearSizesOptionsController::class, 'show']);

Route::patch('/updateMaleFootwearSizesOption/{optionId}', [MaleFootwearSizesOptionsController::class, 'update']);

Route::delete('/deleteMaleFootwearSizesOption/{optionId}', [MaleFootwearSizesOptionsController::class, 'destroy']);


// Product Category Options

Route::post('/createProductCategoryOption', [ProductCategoryOptionsController::class, 'store']);

Route::get('/getAllProductCategoryOption', [ProductCategoryOptionsController::class, 'index']);

Route::get('/getProductCategoryOptionById/{optionId}', [ProductCategoryOptionsController::class, 'show']);

Route::patch('/updateProductCategoryOption/{optionId}', [ProductCategoryOptionsController::class, 'update']);

Route::delete('/deleteProductCategoryOption/{optionId}', [ProductCategoryOptionsController::class, 'destroy']);


// Project Deliverable Status Options

Route::post('/createProjectDeliverableStatusOption', [ProjectDeliverableStatusOptionsController::class, 'store']);

Route::get('/getAllProjectDeliverableStatusOption', [ProjectDeliverableStatusOptionsController::class, 'index']);

Route::get('/getProjectDeliverableStatusOptionById/{optionId}', [ProjectDeliverableStatusOptionsController::class, 'show']);

Route::patch('/updateProjectDeliverableStatusOption/{optionId}', [ProjectDeliverableStatusOptionsController::class, 'update']);

Route::delete('/deleteProjectDeliverableStatusOption/{optionId}', [ProjectDeliverableStatusOptionsController::class, 'destroy']);


// Project Deliverable 

Route::post('/createProjectDeliverable', [ProjectDeliverableController::class, 'store']);

Route::get('/getAllProjectDeliverables', [ProjectDeliverableController::class, 'index']);

Route::get('/getProjectDeliverableById/{id}', [ProjectDeliverableController::class, 'show']);

Route::patch('/updateProjectDeliverable/{id}', [ProjectDeliverableController::class, 'update']);

Route::delete('/deleteProjectDeliverable/{id}', [ProjectDeliverableController::class, 'destroy']);


// Project Status Options

Route::post('/createProjectStatusOption', [ProjectStatusOptionsController::class, 'store']);

Route::get('/getAllProjectStatusOption', [ProjectStatusOptionsController::class, 'index']);

Route::get('/getProjectStatusOptionById/{optionId}', [ProjectStatusOptionsController::class, 'show']);

Route::patch('/updateProjectStatusOption/{optionId}', [ProjectStatusOptionsController::class, 'update']);

Route::delete('/deleteProjectStatusOption/{optionId}', [ProjectStatusOptionsController::class, 'destroy']);

// Clients

Route::post('/createClient', [ClientController::class, 'store']); // If a registered user, only provide currency, country, postal address, credit card?, amount_spent?, owing?, difficult?

Route::get('/getAllClients', [ClientController::class, 'index']);

Route::get('/getClientById/{clientId}', [ClientController::class, 'show']);

Route::patch('/updateClient/{clientId}', [ClientController::class, 'update']);

Route::delete('/deleteClient/{clientId}', [ClientController::class, 'destroy']);


// Client Updates

Route::post('/createClientUpdate', [ClientUpdateController::class, 'store']);

Route::get('/getAllClientUpdate', [ClientUpdateController::class, 'index']);

Route::get('/getClientUpdateById/{updateId}', [ClientUpdateController::class, 'show']);

Route::patch('/updateClientUpdate/{updateId}', [ClientUpdateController::class, 'update']);

Route::delete('/deleteClientUpdate/{updateId}', [ClientUpdateController::class, 'destroy']);

// Freelance Bids

Route::post('/createBid', [FreelanceBidsController::class, 'store']);

Route::get('/getAllBid', [FreelanceBidsController::class, 'index']);

Route::get('/getBidById/{bidId}', [FreelanceBidsController::class, 'show']);

Route::delete('/deleteBid/{bidId}', [FreelanceBidsController::class, 'destroy']);

//Traders Application

Route::post('/createTradersApplication', [TradersApplicationController::class, 'store']);
Route::patch('/approveOrDisapproveTradersApplication/{id}', [TradersApplicationController::class, 'approveOrDisapprove']);


//Bloggers Application

Route::post('/createBloggersApplication', [BloggersApplicationController::class, 'store']);
Route::patch('/approveOrDisapproveBloggersApplication/{id}', [BloggersApplicationController::class, 'approveOrDisapprove']);


//Freelance Application

Route::post('/createFreelanceApplication', [FreelanceApplicationController::class, 'store']);
Route::patch('/approveOrDisapproveFreelanceApplication/{id}', [FreelanceApplicationController::class, 'approveOrDisapprove']);