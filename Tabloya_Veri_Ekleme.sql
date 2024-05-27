CREATE DATABASE kullanici_kayit; 

USE kullanici_kayit; 

CREATE TABLE USERS (
    User_ID INT AUTO_INCREMENT PRIMARY KEY, 
    User_Name VARCHAR(50) NOT NULL UNIQUE, 
    E_Mail VARCHAR(100) NOT NULL UNIQUE, 
    First_Name VARCHAR(50) NOT NULL, 
    Last_Name VARCHAR(50) NOT NULL,
    GSM_No VARCHAR(15) NOT NULL, 
    Birth_Date DATE NOT NULL, 
    Password VARCHAR(255) NOT NULL 
);
