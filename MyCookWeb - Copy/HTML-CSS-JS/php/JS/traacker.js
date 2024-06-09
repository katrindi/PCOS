// Get DOM elements
let weightAmount = document.getElementById("weight-amount");
let testosteroneAmount = document.getElementById("testosterone-level");
let LHAmount = document.getElementById("lh-level");

const bloodButton = document.getElementById("blood-btn");
const weightButton = document.getElementById("weight-button");
const errorMessage = document.getElementById("weight-error");
const valueError = document.getElementById("blood-test-error");

const weight = document.getElementById("weight");
const testosteroneValue = document.getElementById("testosterone-value");
const lhValue = document.getElementById("lh-value");

const list = document.getElementById("list");

const INPUT = document.getElementById("input-btn");

// Function to handle setting weight
weightButton.addEventListener("click", () => {
  const weightKG = weightAmount.value;
  // Empty or negative input
  if (weightKG  === "" || weightKG < 0) {
    errorMessage.classList.remove("hide");
  } else {
    errorMessage.classList.add("hide");
    // Set Weight
    weight.innerText = weightKG;
    // Clear Input Box
    weightAmount.value = "";
  }
});

// Function to modify list elements
const modifyElement = (element, edit = false) => {
  const parentDiv = element.parentElement;
  const currentWeight = weight.innerText;
  const currentTestosterone = testosteroneValue.innerText;
  const currentLH = lhValue.innerText;

  if (edit) {
    weightAmount.value = currentWeight;
    testosteroneAmount.value = currentTestosterone;
    LHAmount.value = currentLH;
  }

  weight.innerText = weightAmount.value;
  testosteroneValue.innerText = testosteroneAmount.value;
  lhValue.innerText = LHAmount.value;

  parentDiv.remove();
};

// Function to create list item for blood test values
const bloodTestListCreator = (weightValue, testosteroneVal, LHVal) => {
  // Create new sublist content element
  const sublistContent = document.createElement("div");
  sublistContent.classList.add("sublist-content", "flex-space");

  // Add HTML content to display blood test values
  sublistContent.innerHTML = `
    <p>Weight: ${weightValue}</p>
    <p>Testosterone: ${testosteroneVal}</p>
    <p>LH: ${LHVal}</p>
  `;

  // Create edit button
  const editButton = document.createElement("button");
  editButton.classList.add("fa-solid", "fa-pen-to-square", "edit");
  editButton.style.fontSize = "1.2em";
  editButton.addEventListener("click", () => {
    modifyElement(editButton, true);
  });

  // Create delete button
  const deleteButton = document.createElement("button");
  deleteButton.classList.add("fa-solid", "fa-trash-can", "delete");
  deleteButton.style.fontSize = "1.2em";
  deleteButton.addEventListener("click", () => {
    modifyElement(deleteButton);
  });

  // Append buttons to sublist content
  sublistContent.appendChild(editButton);
  sublistContent.appendChild(deleteButton);

  // Append sublist content to the list
  list.appendChild(sublistContent);
};

// Event listener for setting blood test values
bloodButton.addEventListener("click", () => {
  // Empty checks
  if (!testosteroneAmount.value || !LHAmount.value) {
    valueError.classList.remove("hide");
    return;
  }

  // Hide error message
  valueError.classList.add("hide");

  // Check testosterone range
  const testosteroneVal = parseInt(testosteroneAmount.value);
  if (testosteroneVal < 264 || testosteroneVal > 916) {
    // Testosterone value out of range
    const errorMessage = "Please be informed that your testosterone level is out of the normal range. You can use the following source in order to manage it.";
    const confirmation = confirm(errorMessage);
    if (confirmation) {
      window.location.href = "info.php"; // Replace "info.php" with the actual link
    }
    return;
  }

  // Set testosterone and LH values
  testosteroneValue.innerText = testosteroneAmount.value;
  lhValue.innerText = LHAmount.value;

  // Clear input fields
  testosteroneAmount.value = "";
  LHAmount.value = "";
});

// Event listener for setting blood test values
INPUT.addEventListener("click", () => {
  // Empty checks
  if (!weight.innerText || !testosteroneValue.innerText || !lhValue.innerText) {
    valueError.classList.remove("hide");
    return;
  }

  // Hide error message
  valueError.classList.add("hide");

  // Call bloodTestListCreator to add blood test values to the list
  bloodTestListCreator(weight.innerText, testosteroneValue.innerText, lhValue.innerText);

  // Clear input fields
  weight.innerText = null;
  testosteroneValue.innerText = null;
  lhValue.innerText = null;
});
