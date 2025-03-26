const calculator = (operator, ...numbers) => {
  switch (operator) {
    case "+":
      return numbers.reduce((a, b) => a + b, 0);
    case "-":
      return numbers.reduce((a, b) => a - b);
    case "*":
      return numbers.reduce((a, b) => a * b, 1);
    case "/":
      return numbers.reduce((a, b) => a / b);
    case "%":
      return numbers.reduce((a, b) => a % b);
    default:
      return "Operator tidak valid!";
  }
};

console.log(calculator("+", 5, 10, 15));
console.log(calculator("*", 2, 3, 4));
console.log(calculator("/", 100, 2, 5));
console.log(calculator("%", 10, 3));
