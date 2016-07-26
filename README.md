## Requirements

* [PHP](http://php.net/) - The latest version of PHP is highly recommended


## Dependencies (Composer)
```CMD
cd tournament_bet
composer validate
composer install
```

## Database Structure

### Tables
```SQL
CREATE TABLE "Bets" (
  "MatchesidMatch" INTEGER, 
  "UseruserID" INTEGER, 
  "betChar" CHAR, 
  "betResult" CHAR
);
CREATE TABLE "Matches" (
  "idMatch" INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL,
  "TournamentidTournament" INTEGER, 
  "dateMatchDate" DATETIME, 
  "idTeamHome" INTEGER, 
  "idTeamAway" INTEGER, 
  "idGoalsHome" INTEGER, 
  "idGoalsAway" INTEGER
);
CREATE TABLE "Teams" (
  "idTeam" INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL, 
  "nameTeam" CHAR, 
  "flagTeam" CHAR
);
CREATE TABLE "Tournament" (
  "idTournament" INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL, 
  "nameTournament" CHAR
);
CREATE TABLE "User" (
  "userID" INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL, 
  "userName" CHAR, 
  "userMail" CHAR, 
  "userSecret" CHAR
);
```

© Markus Thulin 2016-
