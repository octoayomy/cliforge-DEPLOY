package main

import (
	"fmt"
	"os"

	"cliforge-agent/cmd"
	"cliforge-agent/internal/auth"
)

func main() {

	if len(os.Args) < 2 {

		fmt.Println("Usage:")
		fmt.Println("cliforge start <lab-id>")
		fmt.Println("cliforge check")
		fmt.Println("cliforge login")
		fmt.Println("cliforge submit")

		return
	}

	command := os.Args[1]

	switch command {

	case "start":

		if len(os.Args) < 3 {

			fmt.Println("Lab ID required")
			return
		}

		cmd.StartLab(os.Args[2])

	case "check":

		cmd.CheckLab()

	case "login":

		auth.Login()

	default:

		fmt.Println("Unknown command")

	case "submit":

		cmd.SubmitLab()
	}

}
