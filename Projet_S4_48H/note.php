<form id="journal-form" method="post" action="<?php echo site_url('ecriture_con/ecriture_journal');?>">
    <input type="hidden" value="idJ" name="idJ" id="idJ">
    <input type="date" id="dateRHF" name="dateRHF"><br><br>
    <select name="piece" id="piece">
      <?php foreach ($pieces as $piece) { ?>
        <option value=<?php echo $piece['idP']; ?>><?php echo $piece['signification']; ?></option>
      <?php } ?>
    </select><br><br>

    <input type="text" id="reference" name="reference"><br><br>
    <select name="compte-general" id="compte-general">
      <?php foreach ($compteG as $cg) { ?>
        <option value=<?php echo $cg['id']; ?>><?php echo $cg['description']; ?></option>
      <?php } ?>
    </select><br><br>
    <select name="compte-tiers" id="compte-tiers">
      <?php foreach ($compteT as $ct) { ?>
        <option value=<?php echo $ct['idCA']; ?>><?php echo $ct['description'] ?></option>
      <?php } ?>
    </select><br><br>
    <input type="text" id="libelle" name="libelle"><br><br>
    <label for="devise">Devise :</label>
    <select name="devise" id="devise">
      <?php foreach ($devise as $devise) { ?>
        <option value=<?php echo $devise['id']; ?>><?php echo $devise['nom']; ?></option>
      <?php } ?>
    </select><br><br>
    <input type="number" id="debit" name="debit" value=0><br><br>

    <input type="number" id="credit" name="credit" value=0><br><br>

    <input type="submit" value="Soumettre">
  </form>

