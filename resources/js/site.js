document.addEventListener("submit", function (event) {
  const form = event.target;

  if (form.id !== "whatsappForm") {
    return;
  }

  event.preventDefault();

  const name = document.querySelector("#nome").value.trim();
  const phone = document.querySelector("#telefone").value.trim();
  const goal = document.querySelector("#objetivo").value;
  const message = document.querySelector("#mensagem").value.trim() || "Ola! Quero saber mais sobre a Healthy Way DV.";
  const text = [
    `Nome: ${name}`,
    phone ? `Telefone: ${phone}` : "",
    `Objetivo: ${goal}`,
    `Mensagem: ${message}`
  ].filter(Boolean).join("\n");

  window.open(`https://wa.me/5511941101227?text=${encodeURIComponent(text)}`, "_blank", "noopener");
});
