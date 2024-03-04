let currentPage = 1;
let rows = 10;

// Fetch the actors data
function fetchActors(name = '', page = 1, rows = 10) {
  return fetch(`/api/actors?name=${name}&page=${page}&per_page=${rows}`)
    .then(response => response.json())
    .then(data => {
      displayTable(data.data, document.getElementById('tableBody'));
      setupPagination(data.total, document.getElementById('pagination'), rows);
    });
}

// Initial fetch when the page loads
fetchActors();

// Display the table
function displayTable(actors, wrapper) {
  wrapper.innerHTML = "";

  for(let i = 0; i < actors.length; i++){
    let actor = actors[i];

    let item_element = document.createElement('tr');
    item_element.innerHTML = `<td>${actor.name}</td><td>${actor.birth_year}</td><td>${actor.gender}</td>`;
    wrapper.appendChild(item_element);
  }
}

document.getElementById('searchButton').addEventListener('click', () => {
  const searchString = document.getElementById('name').value;
  currentPage = 1; // Reset to first page for a new search
  fetchActors(searchString, currentPage, rows);
});

// Handle the pagination
function setupPagination(total, wrapper, rowsPerPage){
  wrapper.innerHTML = "";

  let pageCount = Math.floor(total / rowsPerPage);
  for(let i = 1; i < pageCount + 1; i++){
    let btn = paginationButton(i);
    wrapper.appendChild(btn);
  }
}

function paginationButton(page){
  let button = document.createElement('a');
  button.href = "#";
  button.innerText = page;
  button.style.marginRight = "10px"; // Add a gap between the links

  if(currentPage == page) button.classList.add('active');

  button.addEventListener('click', function(e){
    e.preventDefault(); // Prevent the default action of the link
    currentPage = page;
    fetchActors(document.getElementById('name').value, currentPage, rows);

    let currentBtn = document.querySelector('#pagination a.active');
    currentBtn?.classList.remove('active');

    button.classList.add('active');
  });

  return button;
}
