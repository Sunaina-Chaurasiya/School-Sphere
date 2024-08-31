-- Create the students table with roll_no as a unique identifier
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    roll_no INT UNIQUE NOT NULL,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    dob DATE,
    gender ENUM('Male', 'Female', 'Other'),
    father_name VARCHAR(100),
    government_id_photo VARCHAR(255),
    age INT,
    guardian_details VARCHAR(255) NULL,
    emergency_contacts VARCHAR(255) NULL,
    address VARCHAR(255),
    contact_number VARCHAR(15),
    email VARCHAR(100),
    class VARCHAR(50) NOT NULL,
    section VARCHAR(50) NOT NULL,
    full_name VARCHAR(200) AS (CONCAT(first_name, ' ', last_name))
);



-- Create the marks table with specific subject columns
CREATE TABLE marks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    roll_no INT,
    maths INT,
    science INT,
    social_science INT,
    english INT,
    hindi INT,
    FOREIGN KEY (roll_no) REFERENCES students(roll_no)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

-- Create the fees table with roll_no as a foreign key
CREATE TABLE fees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    roll_no INT,
    amount DECIMAL(10, 2),
    paid_date DATE,
    status ENUM('Paid', 'Unpaid'),
    FOREIGN KEY (roll_no) REFERENCES students(roll_no)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

-- First, drop the existing foreign key constraint
ALTER TABLE marks DROP FOREIGN KEY marks_ibfk_1;

-- Add the foreign key constraint again with ON UPDATE CASCADE and ON DELETE CASCADE
ALTER TABLE marks
ADD CONSTRAINT marks_ibfk_1 FOREIGN KEY (roll_no)
REFERENCES students(roll_no)
ON UPDATE CASCADE
ON DELETE CASCADE;


-- Drop the existing foreign key constraint
ALTER TABLE fees DROP FOREIGN KEY fees_ibfk_1;

-- Add the foreign key constraint again with ON UPDATE CASCADE and ON DELETE CASCADE
ALTER TABLE fees
ADD CONSTRAINT fees_ibfk_1 FOREIGN KEY (roll_no)
REFERENCES students(roll_no)
ON UPDATE CASCADE
ON DELETE CASCADE;
