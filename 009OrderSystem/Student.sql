-- ----------------------------
-- Table structure for course
-- ----------------------------
Create database Student;
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `course_num` int(11) NOT NULL COMMENT '课程号',
  `course_name` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '课程名',
  `course_hour` int(2) NOT NULL COMMENT '课程学时',
  `course_score` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '课程学分',
  PRIMARY KEY (`course_num`),
  KEY `course_num` (`course_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='课程信息表';

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '面向对象编程', '5', '2');
INSERT INTO `course` VALUES ('2', '算法分析与设计', '5', '2');
INSERT INTO `course` VALUES ('3', 'Python编程', '5', '3');
INSERT INTO `course` VALUES ('4', '软件项目管理', '2', '5');

-- ----------------------------
-- Table structure for score
-- ----------------------------
DROP TABLE IF EXISTS `score`;
CREATE TABLE `score` (
  `score_id` int(11) NOT NULL,
  `course_num` int(11) NOT NULL,
  `student_num` int(11) NOT NULL,
  `score` int(3) NOT NULL COMMENT '分数',
  PRIMARY KEY (`score_id`),
  KEY `course_num` (`course_num`),
  KEY `student_num` (`student_num`),
  CONSTRAINT `score_ibfk_1` FOREIGN KEY (`course_num`) REFERENCES `course` (`course_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `score_ibfk_2` FOREIGN KEY (`student_num`) REFERENCES `student` (`student_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='学生成绩表';

-- ----------------------------
-- Records of score
-- ----------------------------
INSERT INTO `score` VALUES ('1', '1', '1511651021', '89');  
INSERT INTO `score` VALUES ('2', '1', '1511651022', '78');  
INSERT INTO `score` VALUES ('3', '1', '1511651023', '80');  
INSERT INTO `score` VALUES ('4', '1', '1511651024', '78');  
INSERT INTO `score` VALUES ('5', '2', '1511651025', '59');  
INSERT INTO `score` VALUES ('6', '2', '1511651026', '60');  
INSERT INTO `score` VALUES ('7', '2', '1511651027', '75');
INSERT INTO `score` VALUES ('8', '2', '1511651028', '89');
INSERT INTO `score` VALUES ('9', '3', '1511651029', '87');
INSERT INTO `score` VALUES ('10', '3', '1511651030', '77');
INSERT INTO `score` VALUES ('11', '3', '1511651031', '88');
INSERT INTO `score` VALUES ('12', '3', '11511651032', '90');
INSERT INTO `score` VALUES ('13', '4', '1511651033', '90');
INSERT INTO `score` VALUES ('14', '4', '1511653034', '98');
INSERT INTO `score` VALUES ('15', '4', '1511651035', '89');
INSERT INTO `score` VALUES ('16', '4', '1511651036', '88');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `student_num` int(11) NOT NULL COMMENT '学生学号',
  `student_name` varchar(5) CHARACTER SET utf8 NOT NULL COMMENT '学生姓名',
  `student_sex` varchar(1) CHARACTER SET utf8 NOT NULL DEFAULT '男' COMMENT '学生性别',
  `student_birthday` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '学生生日',
  PRIMARY KEY (`student_num`),
  KEY `student_num` (`student_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='学生基本信息表';

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1511651021', '李大钊', '男', '1889-02-19');  
INSERT INTO `student` VALUES ('1511651022', '鲁迅', '男', '1881-09-16');  
INSERT INTO `student` VALUES ('1511651023', '闻一多', '男', '1899-03-12');  
INSERT INTO `student` VALUES ('1511651024', '胡适', '男', '1891-07-12');  
INSERT INTO `student` VALUES ('1511651025', '林徽因', '女', '1904-07-12');  
INSERT INTO `student` VALUES ('1511651026', '徐志摩', '男', '1897-07-12');
