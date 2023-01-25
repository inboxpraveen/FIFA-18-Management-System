# FIFA-18-Management-System (FMS)

This repository contains all the project files and necessary details about applications required to run the project on your local machine.

| Title                           | Description                                                                                        | Link                                                                                                            |
| ------------------------------- | -------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------- |
| Demo :movie_camera:             | Demo and showcase of major highlights in the project                                               | [:point_down: Refer](https://github.com/inboxpraveen/FIFA-18-Management-System#1-demo-movie_camera)             |
| Requirements :heavy_check_mark: | Requirements and essential links to get started with the project                                   | [:point_down: Refer](https://github.com/inboxpraveen/FIFA-18-Management-System#2-requirements-heavy_check_mark) |
| Setup :small_red_triangle_down: | How to setup complete project inside your local system - Windows 10                                | [:point_down: Refer](https://github.com/inboxpraveen/FIFA-18-Management-System#3-setup-small_red_triangle_down) |
| Project Guide :page_with_curl:  | Reference documentation of overall project, it's application, and how to present and showcase demo | [:point_down:Refer](https://github.com/inboxpraveen/FIFA-18-Management-System#4-project-guide)                  |
| Troubleshooting Issues :muscle: | Guide to resolve errors faced during reproducibility                                               | To be Updated                                                                                                   |

Do you like it? :heart: Follow me on [Twitter](https://twitter.com/InboxPraveen), [GitHub](https://github.com/inboxpraveen), & [LinkedIn](https://www.linkedin.com/in/praveen-kumar-inbox/) to say Hi :wave:

<hr>

## 1. Demo :movie_camera:

In this section, we try to understand through video demo to play around the project and what all can be achieved through it.

1. General Overview - To be updated

2. Add/Update Database - To be updated

3. Creating/Deleting Database Triggers - To be updated

____

***Please be slightly patient while I create and upload the demo video. Follow and star this project to get latest notifications and update. :raised_hands:***

<hr>

## 2. Requirements :heavy_check_mark:

To build this project without any errors/issues, the following requirements needs to be satisfied

1. Windows Operating System (Win 10 is preferred)

2. Google Chrome Browser (v80 or Higher)

3. WAMP Web Server (v3.0 or higher)

4. Code Editor (Visual Studio Code - Preferred)

If you are not aware if you have the right versions or you need to install them, fret not. Continue to the installation section at next.

<hr>

## 3. Setup :small_red_triangle_down:

### 3.1 Chrome Installation

- To download latest google chrome web browser on Windows OS and install in your system, just go the following link - [Download Google Chrome Web Browser](https://www.google.com/intl/en_in/chrome/). Once you visit, it will have option for you to download chrome and then install it as usual. 

- If you are on Linux OS, then you can follow - [Install Chrome on Linux Mint - Easy Step-By-Step Guide | Digital Ocean](https://www.digitalocean.com/community/tutorials/install-chrome-on-linux-mint).

- If you are on Mac OS, then you can follow - [How To Install Google Chrome On Mac Quickly](https://setapp.com/how-to/install-google-chrome-for-mac-quickly). 

:spiral_notepad:***NOTE: Google chrome is preferred browser to run everything smoothly, but you can use any other browser of your choice as well. It is not a hard requirement, but can help you ease your UI & UX experience.***

### 3.2 Code Editor

- To download Visual Studio Code - Just follow the official website which contains a build for all 3 platforms. Visit - [Download Visual Studio Code - Mac, Linux, Windows](https://code.visualstudio.com/download)
- You can download your OS based build and install it will all the default instructions.
- Visual Studio Code is preferred editor but there are other good options as well. You can choose to work with whatever you are comfortable or use to.

### 3.3 WAMP Web Server

Installing WAMP Web Server and running a local server on your machine is crucial for replicating and reproducing all the results for this project. 

1. Downloading WAMP Server - Go and grab the WAMP installer application from [here](https://sourceforge.net/projects/wampserver/). The size varies based on which version you download. I have v3.3.0 on my system whose download size was 644 MB.

2. Once you have downloaded, Install the with the following settings.

<img title="Wamp Installlation Step 1" src="./readme_attachments/wamp_installation_1.png" alt="Step 1">

<img title="Wamp Installlation Step 2" src="./readme_attachments/wamp_installation_2.png" alt="Step 2">

After this, it will take some time and then install it. After some time, it will ask for a prompt on choosing the default browser on which your local server will be hosted. It initially shows me Edge, but I wish to change it to Google Chrome. 

<img title="Wamp Installlation Step 3" src="./readme_attachments/wamp_installation_3.png" alt="Step 3">

For changing it to Google Chrome, Just select Yes here, and then find where you have installed Google Chrome on your system. In my case, It's at the following directory.

<img title="Wamp Installlation Step 4" src="./readme_attachments/wamp_installation_4.png" alt="Step 4">

Once we have chosen browser, It will ask for Code editor in a similar fashion. 

<img title="" src="./readme_attachments/wamp_installation_5.png" alt="">

By default it will set Notepad Windows Application, but as we prefer and have already setup Visual Studio Code Editor, we will go ahead and select it from the installed directory.

<img title="" src="./readme_attachments/wamp_installation_6.png" alt="">

This will complete the installation of WAMP Server in our system.

To verify WAMP is successfully installed and the Server is running on your system, search for WAMP in your start menu applications and then run it as "administrator"

<img title="" src="./readme_attachments/running_wamp_1.png" alt="">

Once you run it, after few seconds, a green color wamp icon **should** appear on your tray icon.

<img title="" src="./readme_attachments/running_wamp_2.png" alt="">

If the color is anything but green, it looks like there is some issue while running the server.

<hr>

## 4. Project Guide

### 4.1 Building Database & Schema in WAMP

1. Start the WAMP server and wait for it while the server runs successfully. 

2. Open Google Chrome (or any browser) and type "http://localhost/phpmyadmin" without quotes. You will be presented with the login screen.

3. By default, the Username is "root" & and empty password. If this is not the case for you, you will need to change your username & password.

<img title="" src="./readme_attachments/login_wamp.png" alt="">

4. Once we are logged in, we should create our database schema. To do so, select new from left panel, enter name of database as "fifa" and select encoding as "utf8mb4_unicode_ci" and then hit create button.

<img title="" src="./readme_attachments/building_db_1.png" alt="">

---

More to be updated soon ..... 

FIFA 18 Player management system is a player management software for monitoring and accessing players based on their FIFA 18 PC/XBOX game ratings. HTML, CSS, and JavaScript were used for front-end development, and PHP and MySQL were used for back-end development. The system mainly focuses on basic operation like adding a new player, new statistics, searching players with detailed information and edit as they grow their skills. It is a web-based application designed and developed to help users access players and organize their teams. It’s easy to use, and it features a familiar and attractive user interface combined with strong searching, insertion, and deletion with procedure capabilities.

## FMS requirements

One of the most difficult tasks is the selection of correct version of software. Once the system requirements are known the next step is to determine whether the software package fits the requirements. After initial selection further security is needed to determine the desirability of software compared with other candidates. This section first summarizes the application requirement question and then suggests more detailed comparisons.

### Hardware Requirement

1. 32/64-bit processor
2. i3 or greater intel processor chip
3. 1.7 or more GHz processor

### Software Requirement

1. Windows 7 or higher version OS
2. Google chrome v70.0.3538 or greater
3. WAMPP web server
4. Brackets web editor

## Description of FMS

This project consists of player details which include the likes of player’s age and nationality. It also consists of player statistics which include players technical skills. It also consists of tables containing information such as player earnings, club, and preferred position to play. It also provides a strong search, update, delete, and insert operations delivered with a user-friendly web-based UI. The project also helps the users to keep track of the player details in a computerized way without any trouble. The project contains 7 stored procedures and 3 triggers per table. Stored procedures are used in search engine. Every time the user searches through the database, a procedure is called, and the results is collected and displayed for the user in a structured manner. It also has 3 triggers namely “Insert, Delete and Update” triggers assigned separately to each table. Whenever operations such as insert or delete or update is performed on any table, these triggers are automatically called, and the logs are captured into 3 separate tables, individually for each trigger. Hence use of triggers provides users to trace back all the latest as well as the oldest changes into any table at any point of time.

## Installation and execution procedure

1. Install wamp [Download wamp from here](https://sourceforge.net/projects/wampserver/files/latest/download) 299Mb and update google chrome [download latest chrome from here](https://www.google.com/chrome/).

2. After installing wamp (Default directory : c:/wamp64/) , download the project and paste it in directory : (c:/wamp64/www/).

3. Set your wamp **username to root** and no password. [Instructions to change username and password](https://hsnyc.co/how-to-set-the-mysql-root-password-in-localhost-using-wamp/)

4. Start wampServer64 from the desktop icon and open google chrome and type the following url without quotes: "http://localhost/phpmyadmin/" and enter root as username and press Go.

5. Now first you have to Load the database in your local server and then you can run the project. 
   
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

1. JSLint 

For further queries : Drop me mail at inboxpraveen.17@gmail.com
