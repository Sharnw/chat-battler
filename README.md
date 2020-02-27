## Chat Brawler - A whitelabel chatroom brawl API

### Installation

`php artisan brawl:install`

Follow the promps to create an admin user and optionally seed testing data.

### Proposed features

* Create and name your own chatroom brawler game.
* Upload your own assets including player avatars.
* Define your own loot tables and progression rules.
* Interface with a chatroom via a chatbot and allow players to initiate a brawl with each other.
* Players of each unique game can progress their characters by brawling and winning special challenges.
* Login to customize your character, equip items, and progress your abilities.

### Completed

* Basic CRUD for Sources, Games, Characters, Items, and Battles.
* Modular handling of ChatSources

### Roadmap

* Resolve Battles
* Discord webhook integration for notifications
* Populate characters table from Discord channel members
* Slack integration & ChatSource
* Investigate real-time message events from Discord via websockets
