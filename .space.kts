/**
* JetBrains Space Automation
* This Kotlin-script file lets you automate build activities
* For more info, see https://www.jetbrains.com/help/space/automation.html
*/

job("Run shell script") {
    container(displayName = "Show dir contents", image = "ubuntu") {
        shellScript {
            interpreter = "/bin/bash"
            content = """
                echo Working dir contents
                ls /mnt/space/work
            """
        }
    }
}
