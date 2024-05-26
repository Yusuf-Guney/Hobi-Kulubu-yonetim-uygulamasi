CREATE DATABASE kullanici_kayit; // Veritabanını oluşturur

USE kullanici_kayit; // Veritabanını seçer

CREATE TABLE USERS (
    User_ID INT AUTO_INCREMENT PRIMARY KEY, // Kullanıcı ID'si (otomatik artan)
    User_Name VARCHAR(50) NOT NULL UNIQUE, // Kullanıcı adı (benzersiz)
    E_Mail VARCHAR(100) NOT NULL UNIQUE, // E-posta (benzersiz)
    First_Name VARCHAR(50) NOT NULL, // İsim
    Last_Name VARCHAR(50) NOT NULL, // Soyisim
    GSM_No VARCHAR(15) NOT NULL, // GSM numarası
    Birth_Date DATE NOT NULL, // Doğum tarihi
    Password VARCHAR(255) NOT NULL // Şifre (hashlenmiş)
);
