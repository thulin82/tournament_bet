#!/usr/bin/make -f
#

# --------------------------------------------------------------------------
#
# General
#

OS = $(shell uname -s)

ECHO = echo

ifneq (, $(findstring CYGWIN, $(OS)))
	ECHO = /bin/echo -e
endif

NO_COLOR		= \033[0m
ACTION_COLOR	= \033[32;01m
OK_COLOR		= \033[32;01m
ERROR_COLOR		= \033[31;01m
WARN_COLOR		= \033[33;01m

WHERE-AM-I = $(CURDIR)/$(word $(words $(MAKEFILE_LIST)),$(MAKEFILE_LIST))
THIS_MAKEFILE := $(call WHERE-AM-I)

HELPTEXT = $(ECHO) "$(ACTION_COLOR)--->" `egrep "^\# target: $(1) " $(THIS_MAKEFILE) | sed "s/\# target: $(1)[ ]*-[ ]* / /g"` "$(NO_COLOR)"


# ----------------------------------------------------------------------------
#
# Help
#
# target: help                    - Displays help.
.PHONY:  help
help:
	@$(call HELPTEXT,$@)
	@$(ECHO) "Usage:"
	@$(ECHO) " make [target] ..."
	@$(ECHO) "target:"
	@egrep "^# target:" $(THIS_MAKEFILE) | sed 's/# target: / /g'



# ----------------------------------------------------------------------------
#
# Database
#
# target: database                - Run migrations and seed database
.PHONY: database
database: database-roll-migrate database-migrate database-seed


# target: database-roll-migrate   - Rollback Migrations
.PHONY: database-roll-migrate
database-roll-migrate:
	@$(call HELPTEXT,$@)
	vendor/bin/phinx rollback -e development -t 0


# target: database-migrate        - Run Migrations
.PHONY: database-migrate
database-migrate:
	@$(call HELPTEXT,$@)
	vendor/bin/phinx migrate -e development


# target: database-seed           - Seed database
.PHONY: database-seed
database-seed:
	@$(call HELPTEXT,$@)
	vendor/bin/phinx seed:run -e development
