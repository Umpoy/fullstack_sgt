/* information about jsdocs: 
* param: http://usejsdoc.org/tags-param.html#examples
* returns: http://usejsdoc.org/tags-returns.html
* 
/**
 * Listen for the document to load and initialize the application
 */
$(document).ready(initializeApp);
/**
 * Define all global variables here.  
 */
/***********************
 * student_array - global array to hold student objects
 * @type {Array}
 * example of student_array after input: 
 * student_array = [
 *  { name: 'Jake', course: 'Math', grade: 85 },
 *  { name: 'Jill', course: 'Comp Sci', grade: 85 }
 * ];
 */
var student_array = [];
var gradeAverage = 0;

/***************************************************************************************************
* initializeApp 
* @params {undefined} none
* @returns: {undefined} none
* initializes the application, including adding click handlers and pulling in any data from the server, in later versions
*/
function initializeApp() {
    addClickHandlersToElements();
}
/***************************************************************************************************
* addClickHandlerstoElements
* @params {undefined} 
* @returns  {undefined}
*     
*/
function addClickHandlersToElements() {
    $('.add').on('click', handleAddClicked);
}
/***************************************************************************************************
 * handleAddClicked - Event Handler when user clicks the add button
 * @param {object} event  The event object from the click
 * @return: 
       none
 */
function handleAddClicked() {
    debugger
    addStudent();
}
/***************************************************************************************************
 * handleCancelClicked - Event Handler when user clicks the cancel button, should clear out student form
 * @param: {undefined} none
 * @returns: {undefined} none
 * @calls: clearAddStudentFormInputs
 */
function handleCancelClick() {
    clearAddStudentFormInputs();
}
/***************************************************************************************************
 * addStudent - creates a student objects based on input fields in the form and adds the object to global student array
 * @param {undefined} none
 * @return undefined
 * @calls clearAddStudentFormInputs, updateStudentList
 */
function addStudent() {
    let newStudent = {
        name: $('#studentName').val(),
        course: $('#course').val(),
        grade: $('#studentGrade').val(),
    }
    let inputValid = true
    if (newStudent.name === '' || Number(newStudent.name)) {
        inputValid = false;
        $('#studentName').parent().removeClass('has-.parent()success');
        $('#studentName').parent().addClass('has-error');
    } else {
        $('#studentName').parent().removeClass('has-error');
        $('#studentName').parent().addClass('has-success');
    }
    if (newStudent.course === '' || Number(newStudent.course)) {
        inputValid = false;
        $('#course').parent().removeClass('has-success');
        $('#course').parent().addClass('has-error');
    } else {
        $('#course').parent().removeClass('has-error');
        $('#course').parent().addClass('has-success');
    }
    if (parseInt(newStudent.grade)) {
        $('#studentGrade').parent().removeClass('has-error');
        $('#studentGrade').parent().addClass('has-success');
    } else {
        inputValid = false;
        $('#studentGrade').parent().removeClass('has-success');
        $('#studentGrade').parent().addClass('has-error');
    }
    if (inputValid === false) {
        return
    } else {
        //insert ajax call here
        student_array.push(newStudent);
        updateStudentList(newStudent);
        clearAddStudentFormInputs();
        $('div .form-group').removeClass('has-error');
    }
}
/***************************************************************************************************
 * clearAddStudentForm - clears out the form values based on inputIds variable
 */
function clearAddStudentFormInputs() {
    $('div .form-group').removeClass('has-error');
    $('input').val('');
}
/***************************************************************************************************
 * renderStudentOnDom - take in a student object, create html elements from the values and then append the elements
 * into the .student_list tbody
 * @param {object} studentObj a single student object with course, name, and grade inside
 */
function renderStudentOnDom(newStudent) {
    var tableRow = $('<tr>');
    var tableName = $('<td>').text(newStudent.name)
    var tabelCourse = $('<td>').text(newStudent.course)
    var tableGrade = $('<td>').text(newStudent.grade)
    var tableButton = $('<button>').addClass('btn btn-danger').text('Delete')
    var tableDelete = $('<td>').append(tableButton)
    tableRow.append(tableName, tabelCourse, tableGrade, tableDelete)
    $('tbody').append(tableRow);

}
/***************************************************************************************************
 * updateStudentList - centralized function to update the average and call student list update
 * @param students {array} the array of student objects
 * @returns {undefined} none
 * @calls renderStudentOnDom, calculateGradeAverage, renderGradeAverage
 */
function updateStudentList(newStudent) {
    renderStudentOnDom(newStudent);
    calculateGradeAverage(student_array);
    renderGradeAverage(gradeAverage);
}
/***************************************************************************************************
 * calculateGradeAverage - loop through the global student array and calculate average grade and return that value
 * @param: {array} students  the array of student objects
 * @returns {number}
 */
function calculateGradeAverage(student_array) {
    var studentGradeTotoal = 0;
    gradeAverage = 0;
    if (student_array[0] === undefined) {
        return
    }
    for (var i = 0; i < student_array.length; i++) {
        studentGradeTotoal += parseInt(student_array[i].grade)
    }
    gradeAverage = studentGradeTotoal / student_array.length;
    return gradeAverage
}
/***************************************************************************************************
 * renderGradeAverage - updates the on-page grade average
 * @param: {number} average    the grade average
 * @returns {undefined} none
 */
function renderGradeAverage(gradeAverage) {
    $('.avgGrade').text(Math.floor(gradeAverage))
}








