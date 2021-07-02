import Vditor from "vditor";

const previewElement = document.getElementById("show-content");
previewElement.addEventListener("click", (event) => {
  if (event.target.tagName === "IMG") {
    Vditor.previewImage(event.target);
  }
});
Vditor.mermaidRender(previewElement);
Vditor.abcRender(previewElement);
Vditor.chartRender(previewElement);
Vditor.mathRender(previewElement);
Vditor.mediaRender(previewElement);
Vditor.highlightRender({ lineNumber: true, enable: true }, previewElement);
Vditor.codeRender(previewElement);
Vditor.graphvizRender(previewElement);
Vditor.flowchartRender(previewElement);
Vditor.mindmapRender(previewElement)
Vditor.plantumlRender(previewElement);
