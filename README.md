# Advanced SQL Injection Lab

Offensive Testing & Secure Coding Demonstration

🔍 Project Summary

This project demonstrates how SQL Injection vulnerabilities occur in web applications and how to properly mitigate them using secure coding practices.

The lab intentionally includes vulnerable components alongside secure implementations to show:

* How attackers exploit SQL Injection flaws
* How insecure database queries expose sensitive data
* How to fix these issues using prepared statements and defensive coding

This project highlights both **offensive security awareness** and **defensive engineering skills**.


🎯 What This Project Demonstrates

* Authentication bypass exploitation
* UNION-based data extraction
* Error-based SQL Injection
* Conceptual blind SQL Injection techniques
* Secure implementation using parameterized queries
* Input validation and proper error handling


🧠 Real-World Relevance

SQL Injection remains one of the most critical web vulnerabilities and is consistently listed in the OWASP Top 10.

Improper handling of user input can lead to:

* Credential compromise
* Full database exposure
* Privilege escalation
* Data manipulation or deletion

This lab simulates these risks in a controlled environment and demonstrates practical remediation strategies.



🏗 Technical Stack

* PHP
* MySQL
* Apache (XAMPP for local testing)



📂 Architecture Overview

The project is structured to compare insecure and secure implementations side by side:

* `db.php` – Vulnerable database interaction
* `db_secure.php` – Secure implementation using prepared statements
* `login.php` – Vulnerable authentication logic
* `search.php` – Vulnerable search query
* `search_secure.php` – Hardened search functionality

This structure makes it easy to analyze risk and mitigation in context.


🧪 Vulnerability Demonstrations

1️⃣ Authentication Bypass

The login form is intentionally vulnerable to unsanitized input.

Impact:

* Bypasses authentication logic
* Grants unauthorized access

Root Cause:

* Direct concatenation of user input into SQL queries



2️⃣ UNION-Based SQL Injection

Demonstrates how attackers can extract additional database information by manipulating query structure.

Impact:

* Database enumeration
* Sensitive data disclosure



3️⃣ Error-Based Injection

Illustrates how verbose database error messages can reveal internal database structure.

Impact:

* Schema disclosure
* Reconnaissance for further exploitation



4️⃣ Secure Remediation

Secure versions implement:

* Prepared statements
* Parameter binding
* Reduced error exposure
* Safer query construction

Example:

```php
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
```


🔐 Security Improvements Applied

* Eliminated dynamic query concatenation
* Enforced parameterized statements
* Demonstrated separation between vulnerable and secure modules
* Reduced information leakage through controlled error handling



🚀 Setup Instructions

1. Clone the repository
2. Move it into your web server directory (e.g., `htdocs`)
3. Create a MySQL database
4. Update `config.php` with your database credentials
5. Start Apache & MySQL
6. Access via `http://localhost/Advanced-SQL-Injection-Lab/`



📈 Professional Value

This project demonstrates:

* Understanding of web application attack vectors
* Ability to identify insecure coding patterns
* Knowledge of secure development practices
* Practical application of OWASP principles



⚠️ Ethical Use Notice

This project is strictly for educational and defensive security training.
Testing must only be performed in authorized environments.



📌 Future Enhancements

* Add Dockerized environment
* Implement role-based access control
* Add logging and monitoring features
* Expand blind SQL Injection scenarios
* Include automated security testing



👤 Author

Developed as part of a hands-on web security and secure coding study.
