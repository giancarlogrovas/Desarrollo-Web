//activar bot: nodemon
require('dotenv').config();
const { Client, IntentsBitField, ActivityType } = require('discord.js');
const mongoose = require('mongoose');
const eventHandler = require('./handlers/eventHandler');

const client = new Client({
  intents: [
    IntentsBitField.Flags.Guilds,
    IntentsBitField.Flags.GuildMembers,
    IntentsBitField.Flags.GuildMessages,
    IntentsBitField.Flags.GuildPresences,
    IntentsBitField.Flags.MessageContent,
  ],
});

client.on("ready", (c) => {
  console.log(`${c.user.tag} is online.`);

  setInterval(() => {
    let random = Math.floor(Math.random() * status.length);
    client.user.setActivity(status[random]);
  }, 10000);
});

let status = [
  {
    name: "Under Control",
    type: ActivityType.Streaming,
    url: 'https://www.youtube.com/watch?v=mUEy80wbPyQ',
  },
  {
    name: "Custom status 1",
  },
  {
    name: "Custom status 2",
    type: ActivityType.Watching,
  },
  {
    name: "Under Control",
    type: ActivityType.Listening,
  },
]

client.on("interactionCreate", (interaction) => {
  if (!interaction.isChatInputCommand()) return;

  if (interaction.commandName === "add") {
    const num1 = interaction.options.get("fist-number").value;
    const num2 = interaction.options.get("second-number").value;

    interaction.reply(`The sum is ${num1 + num2}`);
  }
});

client.on("interactionCreate", (interaction) => {
  if (!interaction.isChatInputCommand()) return;

  if (interaction.commandName === "embed") {
    const embed = new EmbedBuilder()
      .setTitle("Embed title")
      .setDescription("This is an embed description")
      .setColor("Random")
      .addFields(
        {
          name: "Field title",
          value: "Some random value",
          inline: true,
        },
        {
          name: "2nd Field title",
          value: "Some random value",
          inline: true,
        }
      );

    interaction.reply({ embeds: [embed] });
  }
});

client.on("messageCreate", (message) => {
  if (message.content === "embed") {
    const embed = new EmbedBuilder()
      .setTitle("Embed title")
      .setDescription("This is an embed description")
      .setColor("Random")
      .addFields(
        {
          name: "Field title",
          value: "Some random value",
          inline: true,
        },
        {
          name: "2nd Field title",
          value: "Some random value",
          inline: true,
        }
      );

    //message.reply({ embeds: [embed]});
    message.channel.send({ embeds: [embed] });
  }
});

client.on("interactionCreate", async (interaction) => {
  try {
    if (!interaction.isButton()) {
      return;
    }

    await interaction.deferReply({ ephemeral: true });

    const role = interaction.guild.roles.cache.get(interaction.customId);
    if (!role) {
      interaction.editReply({
        content: "I couldn´t find that role",
      });
      return;
    }

    const hasRole = interaction.member.roles.cache.has(role.id);

    if (hasRole) {
      await interaction.member.roles.remove(role);
      await interaction.editReply(`The role ${role} has been removed.`);
      return;
    }

    await interaction.member.roles.add(role);
    await interaction.editReply(`The role ${role} has been added.`);
  } catch (error) {
    console.log(error);
  }
});

// (async () => {
//   try {
//     mongoose.set('strictQuery', false);
//     await mongoose.connect(process.env.MONGODB_URI);
//     console.log('Connected to DB.');

//     eventHandler(client);

//     client.login(process.env.TOKEN);
//   } catch (error) {
//     console.log(`Error: ${error}`);
//   }
// })();


