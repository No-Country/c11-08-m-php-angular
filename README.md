# Tu Nexo

![TuNexo Logo](![image](https://github.com/No-Country/c11-08-m-php-angular/assets/90113532/30780355-5e54-4f54-a39c-3cdae6f38b01))

TuNexo is a web page designed to connect students and teachers, providing a platform where users can register as students, search for teachers by subject and filters, schedule appointments, and establish direct contact with professionals. The main goal of Tu Nexo is to facilitate the search and connection between students and teachers, creating an efficient and secure virtual environment.

## Main Features

- **User Registration:** Students and teachers can register on the platform by providing necessary information such as name, email address, and password.
- **Advanced Search:** Students can search for teachers using various filters such as subject, location, or level of experience. This allows users to quickly find professionals that meet their needs.
- **Appointment Scheduling:** Students have the ability to schedule appointments with available teachers. They can select the date and time that best suits them and reserve a slot in the teacher's agenda.
- **Direct Communication:** Once an appointment is scheduled, students can communicate directly with teachers through an integrated messaging system within the platform. This facilitates coordination and allows users to address any doubts or exchange relevant information before the class.
- **Ratings and Reviews:** After each session, students can leave ratings and reviews about their experience with the teacher. This helps maintain the quality of services and provides useful feedback for other users interested in taking classes with the same teacher.

## Technologies Used

- **Frontend:** Angular, Bootstrap
- **Backend:** PHP Laravel
- **Database:** MySQL

## Installation Requirements

1. Make sure you have [Angular](https://angular.io/guide/setup-local) installed on your machine.
2. Clone this repository to your local directory.
git clone https://github.com/tunexo/tunexo.git
3. Navigate to the project root directory.
cd tunexo
Install the frontend dependencies.
npm install
4. Make sure you have [Composer](https://getcomposer.org/doc/00-intro.md) installed on your machine.
5. Navigate to the backend directory.
cd backend
7. Install the backend dependencies.
composer install
8. Configure the database connection in the `.env` file.
9. Run migrations to create the necessary tables in the database.
php artisan migrate
10. Start the backend server.
 ```
 php artisan serve
 ```
11. Start the frontend server.
 ```
 ng serve
 ```
12. Open your web browser and access `http://localhost:4200` to see the Tu Nexo application in action.

## Contributing

If you want to contribute to Tu Nexo, follow these steps:

1. Create a fork of this repository.
2. Create a branch with a clear description of the feature or fix you want to implement.
3. Make the changes and commit them accordingly.
4. Submit a pull request to the main branch of the repository.
5. Wait for your request to be reviewed and merged.

## Team

- Juan Pérez - Full Stack Developer - [juanperez](https://github.com/juanperez)
- María Rodríguez - UX/UI Designer - [maria.rodriguez](https://github.com/maria.rodriguez)

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.




