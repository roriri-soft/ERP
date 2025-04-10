
function goSyllabusDetail(subjectId, subjectName) {
  window.location.href = 'syllabus_detail.php?subject_id=' + subjectId;
}
$(document).ready(function () {
  $('#example2').DataTable();

  // Sample Data
  const topics = [
      {
          id: 14,
          name: "Introduction",
          description: "HTML stands for Hyper Text Markup Language...",
          duration: "1 Hrs"
      },
      // Add more topic objects here
  ];

  // Load into table
  let tbody = $('#syllabusTableBody');
  topics.forEach((topic, index) => {
      tbody.append(`
          <tr>
              <td>${index + 1}</td>
              <td title="${topic.name}" class="text-truncate">${topic.name}</td>
              <td title="${topic.description}" class="text-truncate">${topic.description}</td>
              <td>${topic.duration}</td>
              <td>
                  <button class="btn btn-sm text-warning" data-bs-toggle="modal" data-bs-target="#editTopicModal" onclick="goEditTopic(${topic.id})">
                      <i class="lni lni-pencil"></i>
                  </button>
                  <button class="btn btn-sm text-danger" onclick="goDeleteTopic(${topic.id})">
                      <i class="lni lni-trash"></i>
                  </button>
              </td>
          </tr>
      `);
  });
});
function goEditTopic(id) {
  // Load topic data based on ID (you can fetch from array or DB)
  console.log("Edit Topic ID:", id);
  // Populate modal fields (dummy example)
  $('#editTopicName').val("Introduction");
  $('#editTopicDescription').val("HTML stands for...");
  $('#editTopicDuration').val("1 Hrs");
}

function goDeleteTopic(id) {
  if (confirm("Are you sure you want to delete this topic?")) {
      console.log("Deleted topic ID:", id);
      // Remove from table or DB
  }
}

function saveEditedTopic() {
  const name = $('#editTopicName').val();
  const desc = $('#editTopicDescription').val();
  const duration = $('#editTopicDuration').val();
  console.log("Saving:", name, desc, duration);
  $('#editTopicModal').modal('hide');
}
