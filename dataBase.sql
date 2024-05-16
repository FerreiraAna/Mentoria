# Tabela Alunos
CREATE TABLE Students (
    ID_student INT AUTO_INCREMENT PRIMARY KEY,
    Name1 VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Textr TEXT,
    Objetives TEXT,
    Work1 TEXT,
    Goals TEXT,
    Progress TEXT
    #password_hash VARCHAR(255) NOT NULL ??????????
);

/*
CREATE INDEX idx_name1 ON Students (name1);
CREATE INDEX idx_students_email ON Students (Email);
**/

# Tabela Mentores
CREATE TABLE Mentor (
    ID_mentor INT AUTO_INCREMENT PRIMARY KEY,
    Name2 VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Work_avaible TEXT,
    Schedule_mentor TEXT
);

/*
CREATE INDEX idx_mentor_Name2 ON Mentor (Name2);
CREATE INDEX idx_mentor_email ON Mentor (Email);
**/

#Tabela Recursos
CREATE TABLE Mentoring_Resources (
    Resource_ID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(100) NOT NULL,
    Description TEXT,
    Resource_Type VARCHAR(50),
    URL VARCHAR(200),
    Tags_Categories TEXT
);


# Tabela Mensagens
CREATE TABLE Messages (
    ID_message INT AUTO_INCREMENT PRIMARY KEY,
    Sender INT NOT NULL,
    Recipient INT NOT NULL,
    Content TEXT NOT NULL,
    Date_Time DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Sender) REFERENCES Students(ID_student),
    FOREIGN KEY (Recipient) REFERENCES Students(ID_student)
);

/*
# Tabela de Metas e Progresso
CREATE TABLE Goals_Progress (
    ID_goals INT AUTO_INCREMENT PRIMARY KEY,
    ID_student INT NOT NULL,
    Description_goals TEXT NOT NULL,
    Date_begin DATE,
    Data_finish DATE,
    Progress TEXT,
    FOREIGN KEY (ID_student) REFERENCES Alunos(ID_student)
);**/


# Tabela Fórum
CREATE TABLE Community_Forums (
    Topic_ID INT AUTO_INCREMENT PRIMARY KEY,
    Topic_Title VARCHAR(100) NOT NULL,
    Topic_Description TEXT,
    Author VARCHAR(100) NOT NULL,
    Creation_Date_Time DATETIME DEFAULT CURRENT_TIMESTAMP
)