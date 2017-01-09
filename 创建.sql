CREATE DATABASE ;

CREATE TABLE users(
    u_id int(10) unsigned not null auto_increment primary key comment '用户编号',
    u_name varchar(20) not null unique comment '用户名',
    u_head varchar(255) comment '用户头像',
    u_password char(32) not null comment '密码',
    u_sex enum('0','1','2') default '2' comment '0:女 1:男 2:保密',
    u_phone char(11) unique comment  '手机号码',
    u_realname varchar(20) comment  '真实姓名',
    u_email varchar(50) not null unique comment '邮箱',
    u_skin char(11) comment '皮肤编号',
    u_rules enum('0','1') comment '0:启用 1：禁用',
    u_createtime varchar(20) comment '注册时间'
)engine=MyIsam default charset=utf8;

CREATE TABLE attention(
    u_id int(11) not null comment '用户编号',
    u_gid int(11) comment '关注id',
    u_fid int(11) comment '粉丝id'
)engine=MyIsam default charset=utf8;

CREATE TABLE attnGroup(
    u_id int(11) not null  comment '用户编号',
    u_gid int(11) comment '关注id',
    u_gname varchar(20) comment '关注组名称'
)engine=MyIsam default charset=utf8;

CREATE TABLE groupNum(
    u_id int(11) not null  comment '用户编号',
    u_gnum int(11) comment '组人数',
    u_gname varchar(20) comment '关注组名称'
)engine=MyIsam default charset=utf8;

CREATE TABLE label(
    l_id varchar(11) not null  comment '标签编号',
    l_gname varchar(20) comment '标签内容'
)engine=MyIsam default charset=utf8;

CREATE TABLE userLabel(
    u_id int(11) not null  comment '用户编号',
    l_id varchar(20) comment '标签编号'
)engine=MyIsam default charset=utf8;

CREATE TABLE priMsg(
    pm_id int(11) not null auto_increment primary key comment '私信编号',
    u_id varchar(20) not null comment '发送者编号',
    ru_id varchar(20) not null comment '接收者编号',
    pm_content varchar(255) not null comment '私信内容',
    pm_isread enum('0','1') default '0' comment '是否已读 0未读,1已读',
    pm_issend enum('0','1') default '0' comment '是否推送 0未推送 1 已推送',
    pm_createtime varchar(20) comment '发送时间'
)engine=MyIsam default charset=utf8;

CREATE TABLE msg(
    m_id int(11) not null auto_increment primary key comment '消息编号',
    u_id int(11) not null comment '用户编号',
    t_id int(11) not null comment '话题编号',
    c_id int(11) not null comment '转发编号',
    m_content varchar(150) not null comment '消息内容',
    m_fav int(11) default 0 comment '收藏次数',
    m_reply int(11) default 0 comment '评论次数',
    m_copy int(11) default 0 comment '转发次数',
    m_createtime varchar(20) comment '发表时间',
    m_loadtime int(11) default 0 comment '被浏览次数',
    m_visible enum('0','1') default '0' comment '是否公开 0 公开 1 不公开'
)engine=MyIsam default charset=utf8;

CREATE TABLE msgReply(
    r_id int(11) not null auto_increment primary key comment '评论编号',
    m_id int(11) not null comment '消息编号',
    u_id int(11) not null comment '用户编号',
    c_id int(11) not null comment '转发编号',
    r_time varchar(20) not null comment '评论时间',
    r_content varchar(200) not null comment '评论内容'
)engine=MyIsam default charset=utf8;


CREATE TABLE replyCom(
    rr_id int(11) not null auto_increment primary key comment '回复评论编号',
    r_id int(11) not null comment '评论编号',
    u_id int(11) not null comment '用户编号',
    m_id int(11) not null comment '消息编号'
)engine=MyIsam default charset=utf8;

CREATE TABLE fav(
    f_id int(11) not null auto_increment primary key comment '收藏编号',
    u_id int(11) not null comment '用户编号',
    m_id int(11) not null comment '消息编号'
)engine=MyIsam default charset=utf8;

CREATE TABLE copy(
    c_id int(11) not null auto_increment primary key comment '转发编号',
    u_id int(11) not null comment '用户编号',
    m_id int(11) not null comment '被转发消息编号',
    cu_id int(11) not null comment '被转发用户消息编号'
)engine=MyIsam default charset=utf8;

CREATE TABLE black(
    u_id int(11) not null comment '用户编号',
    b_id int(11) not null comment '被拉黑用户编号'
)engine=MyIsam default charset=utf8;

CREATE TABLE search(
    s_id int(11) not null auto_increment primary key comment '搜索编号',
    s_content varchar(30) not null comment '搜索内容',
    s_count int(11) default 0 comment '搜索次数'
)engine=MyIsam default charset=utf8;

CREATE TABLE msgImg(
    mi_adress varchar(255) not null comment '配图地址',
    m_id varchar(30) not null comment '消息编号'
)engine=MyIsam default charset=utf8;




CREATE TABLE admins(
    g_id int(10) unsigned not null auto_increment primary key comment '管理员id',
    g_head varchar(255) comment '管理员头像',
    g_password char(32) not null comment '密码',
    g_sex enum('0','1','2') default '2' comment '0:女,1:男,2:保密',
    g_phone char(11) unique comment  '手机号码',
    g_realname varchar(20) not null comment  '真实姓名',
    g_email varchar(50) not null unique comment '邮箱',
    g_roles enum('0','1') default '0' comment '0:普通管理员 1:超级管理员',
    g_rules enum('0','1') default '0' comment '0:启用 1：禁用',
    g_createtime varchar(20) comment '注册时间'
)engine=MyIsam default charset=utf8;

CREATE TABLE adv(
    ad_id int(10) unsigned not null auto_increment primary key comment '广告编号',
    ad_imgadress varchar(255) comment '广告图片地址',
    ad_content varchar(255) not null comment '广告内容',
    ad_resource varchar(255) not null comment '广告来源',
    ad_head varchar(255)  comment  '广告来源头像',
    ad_endtime varchar(20) not null comment '广告到期时间'
)engine=MyIsam default charset=utf8;

CREATE TABLE webReact(
    w_id int(10) unsigned not null auto_increment primary key comment '反馈信息编号',
    w_content varchar(255) not null comment '反馈内容'
)engine=MyIsam default charset=utf8;

CREATE TABLE webSta(
    w_count int(10)  comment '点击量'
)engine=MyIsam default charset=utf8;

CREATE TABLE webCof(
    title varchar(255) comment '网站标题',
    kewords varchar(255) comment '网站关键字',
    des varchar(255) comment '网站描述',
    copyright varchar(255) comment '网站版权',
    logo varchar(255) comment '网站logo',
    status enum('0','1') default '0' comment '网站状态 0:开启 1:维护'
)engine=MyIsam default charset=utf8;