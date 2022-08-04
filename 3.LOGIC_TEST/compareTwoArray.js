process.stdin.resume();
process.stdin.setEncoding('utf8');
 
const getLongestIndex = (array1, array2) => {
  let temp = [];
  let data = [];
  let target = [];
  let indexTarget = 0;
  let compare = [];
  let indexCompare = 0;
 
  array1.forEach(key => {
    // except when not includes
    if (!array2.includes(key)) {
      temp.push(data);
       data = [];
       return;
    }
 
    // add to next index
    data.push(key);
 
    // except when length still <2
    if (data.lenght < 2) return;
 
    // array2 temp
    let temp2 = [];
    let data2 = [];
 
    array2.forEach(key2 => {
      const key1 = data[data2.length];
 
      if (key1 === key2) return data2.push(key2);
 
      temp2.push(data2);
      data2 = [];
    });
 
    // get index max data temp2
    const length2 = temp2.map(e => e.length);
    const max = Math.max(...length2);
 
    if (data.length === max) return;
 
    // remove last index when not equals
    data.pop();
    temp.push(data);
    data = [];
 
  });
 
  // final
  const length = temp.map(e => e.length);
  const max = Math.max(...length);
  const index = length.indexOf(max);
 
  return temp[index];
};
 
const handdleArrayToString=(array)=>{
	return "{"+array.join(',')+"}";
};
 
const array1 = [3, 5, 4, 6, 12, 4, 2, 7, 3];
const array2 = [3, 1, 12, 4, 2, 9, 0, 11, 2];
const response=getLongestIndex(array1, array2);
process.stdout.write(handdleArrayToString(response));