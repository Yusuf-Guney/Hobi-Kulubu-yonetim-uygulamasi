CREATE TABLE EVENTS (
    Event_ID INT AUTO_INCREMENT PRIMARY KEY,
    Event_Name VARCHAR(100) NOT NULL,
    Event_Date DATE NOT NULL,
    Event_Description TEXT,
    Organizer_ID INT,
    FOREIGN KEY (Organizer_ID) REFERENCES USERS(User_ID)
);
