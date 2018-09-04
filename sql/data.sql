create table `user`
(
`id` int(11) NOT NULL,
`username` varchar(255) NOT NULL AUTO_INCREMENT,
`auth_key` varchar(255) NOT NULL,
`password_hash` varchar(255) NOT NULL,
`password_reset_token` varchar(255) NOT NULL,
`created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
`email` varchar(255) default '',
PRIMARY KEY(`_id`)
)
AUTO_INCREMENT=1 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_general_ci;

//修改`_id` 为自增长
ALTER TABLE user CHANGE `_id` `_id` int(11) NOT NULL AUTO_INCREMENT;

//修改自增长的开始
ALTER TABLE user AUTO_INCREMENT=1;

//删除自增长
Alter table tb change id id int(10);

//删除主建
Alter table tb drop primary key;

INSERT INTO user (
`username`, 
`auth_key`,
`password_hash`,
`password_reset_token`
)
VALUES 
(
"bayer.hudson",
"HP187Mvq7Mmm3CTU80dLkGmni_FUH_lR",
"$2y$13$EjaPFBnZOQsHdGuHI.xvhuDp1fHpo8hKRSk6yshqa9c5EG8s3C3lO",
"ExzkCOaYc1L8IOBs4wdTGGbgNiG3Wz1I_1402312317"
);


gdcg1996