@include('backend.page.shared.layouts.layout-1', [
  "sectionId" => "homeSection2",
  "sectionData" => $cards ?? [],
  "elements" => [],
  "counter" => 1,
  "imageLabel" => "Image (600 x 400 px)"
])