# Product Feedback System

The **Product Feedback Tool** is a web-based application designed to facilitate communication between users and the product development team. It allows users to submit, view, and vote on product feedback.

## Features

- **User Authentication:** Users can register, log in, and log out. Only authenticated users can submit feedback and vote on existing feedback.

- **Feedback Submission:** A user-friendly form for submitting feedback with a title, description, and category. Users can also attach files.

- **Feedback Listing:** Feedback items are displayed in a paginated list, and users can filter and sort them. Each item shows its title, category, vote count, and the user who submitted it.

- **Feedback Voting:** Users can upvote and downvote feedback items, with only one vote allowed per user per item. A vote count is displayed.

- **Commenting System:** Users can leave comments on feedback items. Comments include the user's name, date, and content, with basic formatting options.

- **User Profiles:** Users can view and edit their personal information, and see a list of feedback items they've submitted on their profile.

- **Notifications:** A notification system informs users of updates to feedback items, such as new comments or status changes.

- **Admin Panel:** Admins can manage feedback items (edit, delete), categorize feedback, and moderate comments.

- **Real-time Updates:** Real-time updates for new feedback submissions, comments, and votes are implemented using technologies like WebSockets.

- **Advanced Commenting Features:** Users can mention other users in comments using the "@" symbol, and rich text editing options are available for comments (e.g., Markdown).

- **Search Functionality:** A search feature allows users to find feedback items based on keywords and filters.

## Getting Started

To get started with the Product Feedback Tool, follow these steps:

1. **Prerequisites**: Ensure you have the following software installed:
   - Node.js
   - npm
   - Composer 
   - Laravel

2. **Setup the Backend**:
   - Clone the repository: `git clone https://github.com/yourusername/product-feedback-tool.git`
   - Navigate to the project directory: `cd product-feedback-tool`
   - Install PHP dependencies: `composer install`
   - Create a `.env` file: `cp .env.example .env`
   - Generate an application key: `php artisan key:generate`
   - Configure your database in the `.env` file.
   - Run migrations: `php artisan migrate`
   - Start the Laravel server: `php artisan serve`

3. **Setup the Frontend**:
   - Install JavaScript dependencies: `npm install`
   - Run the development server: `npm run watch`

4. **Access the Application**: Open your web browser and access the application at `http://feedback_system.test` for the backend and `http://feedback_system.test` for the frontend.

5. **Run Commmand First**: Customize the application to meet your specific requirements.
  - Run `php artisan queue:listen to run queue` to send Emails effecient
  - Run `php artisan websockets:serve` command to Run websockets server to send real time notification 
6. **Run Migrations and Seeder** to start running project run these command 
  - Run `php artisan migrate:fresh --seed` Command to migrate and seed 
7. **After all of that**
   - Run npm run watch and start project 
8. **How it work** 
  - like on feed back button to login 
  - users seeder also create some users
9. **For Admin User** 
    - Email `admin@gmail.com`
    - Password 11223344
10. **For Users**
    - Email `ali@gmail.com`
    - Password  11223344
    - Email `osama@gmail.com`
    - Password  11223344
