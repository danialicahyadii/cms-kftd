"use strict";

$("select").selectric();
$.uploadPreview({
  input_field: "#image-upload",   // Default: .image-upload
  preview_box: "#image-preview",  // Default: .image-preview
  label_field: "#image-label",    // Default: .image-label
  label_default: "Choose File",   // Default: Choose File
  label_selected: "Change File",  // Default: Change File
  no_label: false,                // Default: false
  success_callback: null          // Default: null
});

$.uploadPreview({
    input_field: "#image-upload-award-show",
    preview_box: "#image-preview-award-show",
    label_field: "#image-label-award-show",
    label_default: "Choose File",
    label_selected: "Change File",
    no_label: false,
    success_callback: null
  });
$(".inputtags").tagsinput('items');
