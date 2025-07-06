create or replace view v_employees_departments as
SELECT e.emp_no ,e.birth_date,e.first_name,e.last_name,e.gender,e.hire_date,de.from_date,de.to_date,d.dept_no,d.dept_name 
FROM employees e 
JOIN dept_emp de ON e.emp_no = de.emp_no 
JOIN departments d ON d.dept_no = de.dept_no;



LIMIT 20; 

create or replace view v_employees_departments_current as 
SELECT * from v_employees_departments
WHERE to_date = "9999-01-01"; 

create or replace view v_manager_departments as
SELECT e.emp_no ,e.birth_date,e.first_name,e.last_name,e.gender,e.hire_date,de.from_date,de.to_date,d.dept_no,d.dept_name 
FROM employees e 
JOIN dept_manager de ON e.emp_no = de.emp_no 
JOIN departments d ON d.dept_no = de.dept_no;

create or replace view v_manager_departments_current as 
SELECT * from v_manager_departments
WHERE to_date = "9999-01-01";

SELECT * FROM v_manager_departments_current;

create or replace view v_employees_departments_count as
SELECT COUNT(*) nbEmployees,dept_no  
FROM v_employees_departments_current 
GROUP BY dept_no;

SELECT * FROM v_employees_departments_count;

SELECT v1.dept_no , v1.dept_name ,v2.nbEmployees FROM v_manager_departments_current v1
JOIN v_employees_departments_count v2 ON v1.dept_no = v2.dept_no;


