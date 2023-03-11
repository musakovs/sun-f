### Console
```sh
./command.sh [command] [--date=2023-01-05] [-import] [--file=filename.csv]
```

available commands:
- report
  
  Options:
  - date
  - filename (used with -import flag)
  
  Flags:
  - import 

    
Examples:
```sh
./command.sh report --date=2023-01-05

./command.sh report --date=2023-01-05 -import --file=report-23-01-05.csv
```
