const a = ["apple", "orange", "mango", "melon"];

console.log(a.join("#"));
console.log(a.reverse());

const b = [1,6,3,4,5,2];
console.log(b.sort());

a.forEach(function(v, i) {
	console.log("v = " + v);
	console.log("i = " + i);
});