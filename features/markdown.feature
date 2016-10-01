Feature: Markdown parser for esc/pos

    Background:
        Given I have a virtual printer listening "virtual-printer.input" file.

    @wip @exec
    Scenario Outline: I successfuly print the file "<name>" in markdown
        When I execute command "print resources/markdown/<name>.md"
        Then the command is successfully executed
        And the command print "Printing resources/<name>.md"
        And the printer "virtual-printer.input" is equal to "resources/<name>.escpos.print"

    Examples:
        | name                      |
        | atx_heading               |

    @wip
    Scenario: I give a not existing file to the command
        When I execute command "print not-exist-file"
        Then the command return an error
        And the command print "Error : \"not-exist-file\" not exist"

    @wip
    Scenario: I give a bad markdown file to the command
        When I execute command "print resources/bad-file.md"
        Then the command return an error
        And the command print "Error : \"resources/bad-file.md\" is not a valide markdown file"

    @wip
    Scenario: I give no argument to the command
        When I execute command "print"
        Then the command return an error
        And the command print "Error : parameters 1 is missing"