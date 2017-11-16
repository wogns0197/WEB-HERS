create table user
(
    name        varchar(10),
    student_ID  integer(10),
    phone_num   integer(15),
    e_mail      varchar(30),
    user_id     varchar(30),
    user_pw     varchar(30),
    dept_name   varchar(15),

    primary key(user_id)
);
create table footsal_manage
(
  manage_ID     integer(10) not null default 1,
  user_id       varchar(10),
  borrowdate    date,
  start_time    date,
  end_time      date,
  place         varchar(10),
  purpose       varchar(30),
  people        integer(5),
  groupname     varchar(10),
  primary key(manage_ID,borrowdate),
  constraint foreign key (user_id) references user(user_id)
    on delete set null
);
create table purposeview
(
    manage_ID   integer(10),
    purpose     varchar(30),
    borrowdate  date,
    start_time  date,
    end_time    date
    primary key(manage_ID,borrowdate)
);
create table lec_room_manage
(
  manage_ID     integer(10),
  user_id       varchar(10),
  borrowdate    date,
  start_time    date,
  end_time      date,
  place         varchar(20),
  purpose       varchar(30),
  people        integer(5),
  groupname     varchar(10),
  primary key(manage_ID,borrowdate),
  foreign key(user_id) references user(user_id)
    on delete set null
);

