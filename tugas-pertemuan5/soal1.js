const readline = require("readline");

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});

const fibonacci = (n) => {
  let n1 = 0,
    n2 = 1,
    nextTerm;
  let series = [];

  for (let i = 1; i <= n; i++) {
    series.push(n1);
    nextTerm = n1 + n2;
    n1 = n2;
    n2 = nextTerm;
  }
  return series;
};

rl.question("Enter the number of terms: ", (num) => {
  const number = parseInt(num);
  if (isNaN(number) || number <= 0) {
    console.log("Please enter a valid positive number.");
  } else {
    console.log("Fibonacci Series:", fibonacci(number).join(", "));
  }
  rl.close();
});
