CREATE TABLE `homes` (
  `home_id` int(25) NOT NULL,
  `home_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`home_id`, `home_name`, `address`, `user_id`) VALUES
(17, 'Dream', 'PARIS', 23);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(25) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_type` varchar(25) NOT NULL,
  `home_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `room_type`, `home_id`) VALUES
(204, 'Kitchen', 'cooking', 17),
(227, 'Store room', 'others', 17);

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

CREATE TABLE `sensors` (
  `sensor_id` int(25) NOT NULL,
  `sensor_name` varchar(50) NOT NULL,
  `sensor_type` varchar(25) NOT NULL,
  `room_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `sensors`
--

INSERT INTO `sensors` (`sensor_id`, `sensor_name`, `sensor_type`, `room_id`) VALUES
(8, 'light', 'sdf', 204);


--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`sensor_id`);


-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `home_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `sensor_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


