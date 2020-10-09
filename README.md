 # FIFA-18-Management-System (FMS)

This repository contains all the project files and necessary details about softwares to run the project on your local machine.

***NOTE : Please read installation and execution steps present at the bottom before downloading. Thank you***

***Project demo : [Project demo video link](https://drive.google.com/open?id=1dcTCe_G5rUe6ibVh3Yd_pe3PIPPDiJ1c)***

## About FMS

The project titled “FIFA 18 Player management system” is player management software for monitoring and accessing players based on their FIFA 18 PC/XBOX Game ratings. This project is developed using HTML, CSS and JavaScript for front-end and PHP, MySQL for back-end, which focuses on basic operation like adding a new player, new statistics, searching players with detailed information and edit as they grow their skills.
This project is a web based application designed and developed to help user’s access players and organize teams. This software is easy to use, and it features a familiar and well- thought-out attractive user interface, combined with strong searching, insertion, and deletion with procedure capabilities.

## FMS requirements

One of the most difficult tasks is that, the selection of the software, once system requirement is known is determining whether a software package fits the requirements. After initial selection further security is needed to determine the desirability of software compared with other candidates. This section first summarizes the application requirement question and then suggests more detailed comparisons.

### Hardware Requirement

1.	32/64-bit processor
2.	i3 or greater intel processor chip
3.	1.7 or more GHz processor

### Software Requirement
1.	Windows 7 or higher version OS
2.	Google chrome v70.0.3538 or greater
3.	WAMPP web server
4.	Brackets web editor

## Description of FMS

This project consists of player details, which describes about player biodata such as age and nationality. It also consists of player stats which describes about players technical skills. It also consists of tables containing details such as player earnings, club information and preferred position of playing. It also provide a strong searching, updating, deleting and inserting operations with a user friendly web based UI.
The project also helps the users to keep track of the player details in a computerized way without any trouble. The project contains **7 stored procedures** and **3 triggers** per table. Stored procedures are used in search engine. Every time the user searches through the database, a procedure is called and the results is collected and displayed for the user in a structured manner. It also has 3 trigger namely “Insert, Delete and Update” triggers assigned separately to each table. Whenever operations such as insert or delete or update is performed on any table, these triggers are automatically called, and the logs are captured into 3 separate tables, individually for each trigger. Hence use of triggers provides users to trace back all the latest as well as the oldest changes into any table at any point of time.

## Installtion and execution procedure

- 1 : Install wamp [Download wamp from here](https://sourceforge.net/projects/wampserver/files/latest/download) 299Mb and update google chrome [download latest chrome from here](https://www.google.com/chrome/).

- 2 : After installing wamp (Default directory : c:/wamp64/) , download the project and paste it in directory : (c:/wamp64/www/).

- 3 : Set your wamp **username to root** and no password. [Instructions to change username and password](https://hsnyc.co/how-to-set-the-mysql-root-password-in-localhost-using-wamp/)

- 4 : Start wampServer64 from the desktop icon and open google chrome and type the following url without quotes: "http://localhost/phpmyadmin/" and enter root as username and press Go.

- 5 : Now first you have to Load the database in your local server and then you can run the project. 
     
     To load the database :
        
        - Click on +New on the left hand column
        - Give database name as "fifa" (without quotes and small case) and set character encoding to "utf8mb4_unicode_ci"
        - After creating the database successfully, on the upper main menu panel, click on Import and then click "choose file" from file to import menu. Now browse to directory where you saved the project (expected directory: c://wamp/www/your_project_name/db/fifa.sql) and click on fifa.sql and then go down and click Go (Do not change any other settings).
        - After importing successfully, loading the database is complete.
      
     Run the project :
      
          - Open a new tab in chrome
          - type the following url : http://localhost/your_project_name_inside_www_directory/index.html
          - enjoy.
 
## Linting tool used:
 1 : JSLint
 

For further queries : Drop me mail at pklappy21@gmail.com
