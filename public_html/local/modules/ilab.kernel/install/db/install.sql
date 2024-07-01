create table if not exists ilab_kernel_log
(
    ID int not null auto_increment,
    DATETIME datetime not null,
    SCRIPT varchar(255) null,
    TYPE varchar(255) null,
    RESULT text null,
    primary key (ID),
    index TYPE(TYPE(30))
);