CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `catID` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `editdate` int(11) DEFAULT '0',
  `editcomID` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Table structure for table `tickets_comments`
--

CREATE TABLE `tickets_comments` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `desc` text NOT NULL,
  `time` int(11) NOT NULL,
  `ticketID` int(11) NOT NULL,
  `quoteID` int(11) DEFAULT '0',
  `review` int(11) DEFAULT '0',
  `type` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_comments`
--
ALTER TABLE `tickets_comments`
  ADD PRIMARY KEY (`id`);

  --
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets_comments`
--
ALTER TABLE `tickets_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
